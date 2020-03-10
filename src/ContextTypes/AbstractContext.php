<?php

namespace JsonLd\ContextTypes;

use DateTime;
use JsonLd\Context;
use JsonLd\Contracts\ContextTypeInterface;

abstract class AbstractContext implements ContextTypeInterface
{
    /**
     * Context type
     *
     * @var string
     */
    public $type;

    /**
     * Context properties
     *
     * @var array
     */
    public $properties;

    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'name' => '',
    ];

    /**
     * Property structure
     *
     * @var array
     */
    protected $extendStructure = [];

    /**
     * Property structure, will be merged up for objects extending Thing
     *
     * @var array
     */
    private $extendedStructure = [];

    /**
     * Create a new context type instance
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        // Set type
        $path = explode('\\', get_class($this));
        $this->type = end($path);

        // Set attributes
        $this->fill($attributes);
    }

    /**
     * After fill event.
     *
     * @param array $attributes
     */
    public function afterFill($attributes)
    {
        //
    }

    /**
     * Creates an array of schema.org attribute from attributes.
     *
     * @param array $attributes
     */
    public function fill($attributes)
    {
        // Some context types have varying types
        if ($this->hasGetMutator('type')) {
            $this->type = $this->mutateAttribute('type', $this->getArrValue($attributes, 'type', $this->type));
        }

        // Set properties
        $properties = array_merge([
            '@context' => 'http://schema.org',
            '@type' => $this->type,
            'sameAs' => null
        ], $this->structure, $this->extendStructure);

        // Set properties from attributes
        foreach ($properties as $key => $property) {
            $this->setProperty($key, $property, $this->getArrValue($attributes, $key, ''));
        }

        // After fill event
        $this->afterFill($attributes);
    }

    /**
     * Set sameAs Attribute
     *
     * @param mixed $value
     *
     * @return mixed
     */
    protected function setSameAsAttribute($value)
    {
        return $value;
    }

    /**
     * Creates context properties.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Get an item from properties.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getProperty($key, $default = null)
    {
        return $this->getArrValue($this->getProperties(), $key, $default);
    }

    /**
     * Set property value in attributes.
     *
     * @param string $key
     * @param mixed  $property
     * @param mixed  $value
     *
     * @return mixed
     */
    protected function setProperty($key, $property, $value = null)
    {
        // Can't be changed
        if ($key[0] === '@') {
            return $this->properties[$key] = $property;
        }

        // If the attribute has a get mutator, we will call that
        // then return what it returns as the value.
        if ($this->hasGetMutator($key)) {
            return $this->properties[$key] = $this->mutateAttribute($key, $value);
        }

        // Format date and time to UTC
        if ($value instanceof DateTime) {
            return $this->properties[$key] = $value->format('Y-m-d\TH:i:s');
        }

        // Set nested context
        if ($value instanceof Context) {
            return $this->properties[$key] = $this->filterNestedContext($value->getProperties());
        }

        // Set nested context from class
        if ($property && class_exists($property)) {
            return $this->properties[$key] = $this->getNestedContext($property, $value);
        }

        // Map properties to object
        if ($property !== null && is_array($property) && is_array($value)) {
            return $this->properties[$key] = $this->mapProperty($property, $value);
        }

        // Set value
        return $this->properties[$key] = $value;
    }

    /**
     * Set context type.
     *
     * @param string $type
     *
     * @return void
     */
    protected function setType($type)
    {
        $this->properties['@type'] = $type;
    }

    /**
     * Get nested context array.
     *
     * @param string $class
     * @param array  $attributes
     *
     * @return array
     */
    protected function getNestedContext($class, $attributes = null)
    {
        // Must be an array
        if (is_array($attributes) === false) return $attributes;

        // Create nested context
        $context = new $class($attributes);

        // Return context attributes
        return $this->filterNestedContext($context->getProperties());
    }

    /**
     * Filter nested context array.
     *
     * @param array $properties
     *
     * @return array
     */
    protected function filterNestedContext(array $properties = [])
    {
        $func = function ($value, $key) {
            return ($value && $key !== '@context');
        };

        if (defined('ARRAY_FILTER_USE_BOTH') === false) {
            $return = [];
            foreach ($properties as $k => $v) {
                if (call_user_func($func, $v, $k)) {
                    $return[$k] = $v;
                }
            }

            return $return;
        }

        return array_filter($properties, $func, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param string $key
     *
     * @return bool
     */
    protected function hasGetMutator($key)
    {
        return method_exists($this, 'set' . $this->getMutatorName($key) . 'Attribute');
    }

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param string $key
     * @param mixed  $args
     *
     * @return mixed
     */
    protected function mutateAttribute($key, $args)
    {
        return $this->{'set' . $this->getMutatorName($key) . 'Attribute'}($args);
    }

    /**
     * Get mutator name from string.
     *
     * @param string $value
     *
     * @return string
     */
    protected function getMutatorName($value)
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return lcfirst(str_replace(' ', '', $value));
    }

    /**
     * Get property value from attributes.
     *
     * @param array $template
     * @param array $props
     *
     * @return mixed
     */
    protected function mapProperty(array $template = [], $props = [])
    {
        // No values set
        if (is_array($props) === false) {
            return null;
        }

        foreach ($template as $key => $value) {
            if ($key[0] !== '@') {
                $template[$key] = $this->getArrValue($props, $key, '');
            }
        }

        return array_filter($template);
    }

    /**
     * Trim a string to a given number of words
     *
     * @param string $string
     * @param int    $limit
     * @param string $pad
     * @param string $break
     *
     * @return string
     */
    protected function truncate($string, $limit, $pad = '...', $break = ' ')
    {
        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }

    /**
     * Get an item from an array.
     *
     * @param array  $array
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    protected function getArrValue(array $array, $key, $default = null)
    {
        if (is_null($key)) {
            return $default;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        return $default;
    }
}
