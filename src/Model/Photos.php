<?php
/**
 * @see https://market-scanner.ru/doc/photos
 */
namespace MarketScanner\Model;

class Photos extends Base {

    /**
     * @var array
     */
    protected $pictures;

    /**
     * Photos constructor.
     *
     * @param string $key
     * @param int    $id
     */
    public function __construct(string $key, int $id)
    {
        $this->setEntityUrl('/photos');

        parent::__construct([
            'key' => $key,
            'id' => $id,
        ]);
    }

    /**
     * @return array
     */
    public function getPictures() : array
    {
        return $this->pictures ?? [];
    }

    /**
     * @param \stdClass $pictures
     *
     * @return Photos
     */
    public function setPictures($pictures) : self
    {
        $this->pictures = (array) $pictures;

        return $this;
    }
}