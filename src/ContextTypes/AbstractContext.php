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
        'name' => null,
    ];

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

        $class = get_called_class();
        while ($class = get_parent_class($class)) {
            $this->structure += get_class_vars($class)['structure'];
        }

        // Set attributes
        $this->fill($attributes);
    }

    /**
     * After fill event.
     *
     * @param array $attributes
     */
    public function afterFill(array $attributes): void
    {
        //
    }

    /**
     * Creates an array of schema.org attribute from attributes.
     *
     * @param array $attributes
     */
    public function fill(array $attributes)
    {
        // Some context types have varying types
        if ($this->hasGetMutator('type')) {
            $this->type = $this->mutateAttribute(
                'type', $this->getArrValue($attributes, 'type', $this->type)
            );
        }

        // Set properties
        $properties = array_merge([
            '@context' => 'http://schema.org',
            '@type' => $this->type,
            'sameAs' => null
        ], $this->structure);

        // Set properties from attributes
        foreach ($properties as $key => $property) {
            $this->properties[$key] = $this->makeProperty(
                $key, $property, $this->getArrValue($attributes, $key,'')
            );
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
    public function getProperties(): array
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
    public function getProperty(string $key, $default = null)
    {
        return $this->getArrValue(
            $this->getProperties(), $key, $default
        );
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
    protected function makeProperty(string $key, $property, $value = null)
    {
        // Can't be changed
        if ($key[0] === '@') {
            return $property;
        }

        // If the attribute has a get mutator, we will call that
        // then return what it returns as the value.
        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $value);
        }

        // Format date and time to UTC
        if ($value instanceof DateTime) {
            return $value->format('Y-m-d\TH:i:s');
        }

        // Set nested context
        if ($value instanceof Context) {
            return $this->filterNestedContext($value->getProperties());
        }

        if (is_array($value) && $this->hasValidContext($value, $property)) {
            return $this->makeContext($value);
        }

        // Set nested context from class
        if (is_array($value) && is_string($property) && class_exists($property)) {
            // Check if it is an array with one dimension
            if (is_array(reset($value)) === false) {
                $nested_context = $this->getNestedContext($property, $value);
            } else {
                // Process multi dimensional array
                $nested_context = array_map(function ($item) use ($property) {
                    return $this->getNestedContext($property, $item);
                }, $value);
            }

            return $nested_context;
        }

        // Set value
        return $value;
    }

    /**
     * Set context type.
     *
     * @param string $type
     *
     * @return void
     */
    protected function setType(string $type): void
    {
        $this->properties['@type'] = $type;
    }

    /**
     * Get nested context array.
     *
     * @param string $class
     * @param mixed  $attributes
     *
     * @return mixed
     */
    protected function getNestedContext(string $class, $attributes = null)
    {
        // Must be an array
        if (is_array($attributes) === false) {
            return $attributes;
        }

        /** @var ContextTypeInterface $context */
        $context = new $class($attributes);

        // Return context attributes
        return $this->filterNestedContext(
            $context->getProperties()
        );
    }

    /**
     * Filter nested context array.
     *
     * @param array $properties
     *
     * @return array
     */
    protected function filterNestedContext(array $properties = []): array
    {
        return array_filter($properties, function ($value, $key) {
            return ($value && $key !== '@context');
        }, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param string $key
     *
     * @return bool
     */
    protected function hasGetMutator(string $key): bool
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
    protected function mutateAttribute(string $key, $args)
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
    protected function getMutatorName($value): string
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
     * @return array|null
     */
    protected function mapProperty(array $template = [], array $props = []): ?array
    {
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
    protected function truncate(string $string, int $limit, string $pad = '...', string $break = ' '): string
    {
        // Return with no change if string is shorter than $limit
        if (strlen($string) <= $limit) {
            return $string;
        }

        // Is $break present between $limit and the end of the string?
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
    protected function getArrValue(array $array, string $key, $default = null)
    {
        if (is_null($key)) {
            return $default;
        }

        return isset($array[$key])
            ? $array[$key]
            : $default;
    }

    /**
     * Check if the values array has a key '@type' and if that contains an existing context
     *
     * @param array $value
     * @param string|array $property
     *
     * @retrun bool
     */
    protected function hasValidContext(array $value, $property)
    {
        if (array_key_exists('@type', $value)) {
            $class_name = __NAMESPACE__ .'\\'. $value['@type'];

            if (!is_array($property)) {
                $property = [$property];
            }

            return (in_array($class_name, $property) && class_exists($class_name));
        }

        return false;
    }

    protected function makeContext(array $value)
    {
        $property = __NAMESPACE__ .'\\'. $value['@type'];

        return $this->getNestedContext($property, $value);
    }
}
