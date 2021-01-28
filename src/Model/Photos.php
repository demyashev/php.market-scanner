<?php
/**
 * @see https://ymscanner.ru/doc/photos
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
     * @param string $size original|50x50|75x75|100x100|120x120|150x150|200x200|240x240|250x250|500x500|1000x1000
     *
     * @return array
     */
    public function getPictures(string $size = '') : array
    {
        $pictures = $this->pictures ?? [];

        if ($size) {
            $picturesSized = [];

            foreach ($pictures as $pictureNumber => $pictureCollection) {
                foreach ($pictureCollection as $pictureItem) {
                    if ($pictureItem->size === $size) {
                        $picturesSized[$pictureNumber][] = $pictureItem;
                    }
                }
            }

            $pictures = $picturesSized;
        }

        return $pictures;
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