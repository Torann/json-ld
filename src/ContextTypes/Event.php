<?php

namespace JsonLd\ContextTypes;

class Event extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    private $extendedStructure = [
        'about'  => null,
        'actor' => null,
        'aggregateRating' => null,
        'attendee' => null,
        'audience' => null,
        'composer' => null,
        'contributor' => null,
        'director' => null,
        'doorTime' => null,
        'duration' => null,
        'endDate' => null,
        'eventStatus' => null,
        'funder' => null,
        'inLanguage' => null,
        'isAccessibleForFree' => null,
        'location' => Place::class,
        'maximumAttendeeCapacity' => null,
        'offers' => [],
        'organizer' => null,
        'performer' => null,
        'previousStartDate' => null,
        'recordedIn' => null,
        'remainingAttendeeCapacity' => null,
        'review' => null,
        'sponsor' => null,
        'startDate' => null,
        'subEvent' => null,
        'superEvent' => null,
        'translator' => null,
        'typicalAgeRange' => null,
        'workFeatured' => null,
        'workPerformed' => null,
    ];

    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct($attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure));
    }

    /**
     * Set offers attributes.
     *
     * @param  mixed $values
     * @return array
     */
    protected function setOffersAttribute($values)
    {
        if (is_array($values)) {
            foreach($values as $key => $value) {
                $values[$key] = $this->mapProperty([
                    'name' => '',
                    'price' => '',
                    'url' => '',
                ], $value);
            }
        }

        return $values;
    }
}
