<?php

namespace JsonLd\ContextTypes;

use DateTime;

/**
 * A media object, such as an image, video, or audio object embedded in a web
 * page or a downloadable dataset i.e. DataDownload. Note that a creative work
 * may have many media objects associated with it on the same web page.
 * For example, a page about a single song (MusicRecording) may have a music
 * video (VideoObject), and a high and low bandwidth audio stream (2 AudioObject's).
 *
 * https://schema.org/MediaObject
 */
class MediaObject extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $extendedStructure = [
        'associatedArticle' => NewsArticle::class,
        'bitrate' => null,
        'contentSize' => null,
        'contentUrl' => null,
        'duration' => Duration::class,
        'embedUrl' => null,
        'encodesCreativeWork' => CreativeWork::class,
        'encodingFormat' => null,
        'endTime' => null,
        'height' => QuantitativeValue::class,
        'playerType' => null,
        'productionCompany' => Organization::class,
        'regionsAllowed' => Place::class,
        'requiresSubscription' => null,
        'startTime' => DateTime::class,
        'uploadDate' => DateTime::class,
        'width' => QuantitativeValue::class,
    ];

    /**
     * @param array $attributes
     * @param array $extendedStructure
     */
    public function __construct(array $attributes, array $extendedStructure = [])
    {
        parent::__construct(
            $attributes, array_merge($this->structure, $this->extendedStructure, $extendedStructure)
        );
    }
}