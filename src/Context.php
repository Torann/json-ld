<?php

namespace JsonLd;

use InvalidArgumentException;
use JsonLd\Contracts\ContextTypeInterface;

class Context
{
    /**
     * Context type
     *
     * @var ContextTypeInterface
     */
    protected $context = null;

    /**
     * Create a new Context instance
     *
     * @param string $context
     * @param array  $data
     */
    public function __construct($context, array $data = [])
    {
        $class = $this->getContextTypeClass($context);

        $this->context = new $class($data);
    }

    /**
     * Present given data as a JSON-LD object.
     *
     * @param string $context
     * @param array  $data
     *
     * @return static
     */
    public static function create($context, array $data = [])
    {
        return new static($context, $data);
    }

    /**
     * Return the array of context properties.
     *
     * @return array
     */
    public function getProperties()
    {
        return array_filter($this->context->getProperties());
    }

    /**
     * Generate the JSON-LD script tag.
     *
     * @return string
     */
    public function generate()
    {
        $properties = $this->getProperties();

        return $properties ? "<script type=\"application/ld+json\">" . json_encode($properties, JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>" : '';
    }

    /**
     * Return script tag.
     *
     * @param string $name
     *
     * @return string|null
     * @throws InvalidArgumentException
     */
    protected function getContextTypeClass($name)
    {
        // Check for custom context type
        if (class_exists($name)) {
            return $name;
        }

        // Create local context type class
        $class = ucwords(str_replace(['-', '_'], ' ', $name));
        $class = '\\JsonLd\\ContextTypes\\' . str_replace(' ', '', $class);

        // Check for local context type
        if (class_exists($class)) {
            return $class;
        }

        // Backwards compatible, remove in a future version
        switch ($name) {
            case 'address':
                return ContextTypes\PostalAddress::class;
                break;
            case 'business':
                return ContextTypes\LocalBusiness::class;
                break;
            case 'breadcrumbs':
                return ContextTypes\BreadcrumbList::class;
                break;
            case 'geo':
                return ContextTypes\GeoCoordinates::class;
                break;
        }

        throw new InvalidArgumentException(sprintf('Undefined context type: "%s"', $name));
    }

    /**
     * Return script tag.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }
}
