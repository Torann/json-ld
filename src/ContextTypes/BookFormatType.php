<?php

namespace JsonLd\ContextTypes;

/**
 * The publication format of the book.
 *
 * https://schema.org/BookFormatType
 */
class BookFormatType extends Enumeration
{
    /**
     * Book format: Audiobook. This is an enumerated value for use with the
     * bookFormat property. There is also a type 'Audiobook' in the bib
     * extension which includes Audiobook specific properties.
     *
     * @see http://schema.org/AudiobookFormat
     */
    const AUDIOBOOK = 'http://schema.org/AudiobookFormat';

    /**
     * Book format: Ebook.
     *
     * @see http://schema.org/EBook
     */
    const EBOOK = 'http://schema.org/EBook';

    /**
     * Book format: GraphicNovel. May represent a bound collection of
     * ComicIssue instances.
     *
     * @see http://schema.org/GraphicNovel
     */
    const GRAPHIC_NOVEL = "https://schema.org/GraphicNovel";

    /**
     * Book format: Hardcover.
     *
     * @see http://schema.org/Hardcover
     */
    const HARDCOVER = 'http://schema.org/Hardcover';

    /**
     * Book format: Paperback.
     *
     * @see http://schema.org/Paperback
     */
    const PAPERBACK = 'http://schema.org/Paperback';

    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [];
}