<?php

namespace MarketScanner;

use MarketScanner\Model\Balance;
use MarketScanner\Model\Info;
use MarketScanner\Model\Photos;
use MarketScanner\Model\Price;
use MarketScanner\Model\Prices;
use MarketScanner\Model\Searchmodel;
use MarketScanner\Model\Specs;
use MarketScanner\Model\Reviews;

class Scanner {

    private $key;

    /**
     * Scanner constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return int
     */
    public function getBalance() : int
    {
        return (new Balance($this->key))->getBalance();
    }

    /**
     * @param int $id
     *
     * @return Info
     */
    public function getInfo(int $id) : Info
    {
        return new Info($this->key, $id);
    }

    public function getPrice(int $id) : Price
    {
        return new Price($this->key, $id);
    }

    public function getPrices(array $ids) : array
    {
        $prices = new Prices($this->key, implode(',', $ids));

        return $prices->getPrices($this->key);
    }

    public function getSearchModel(string $search)
    {
        return new Searchmodel($this->key, $search);
    }

    /**
     * @param int $id
     * @param string $size
     *
     * @return array
     */
    public function getPhotos(int $id, string $size = '') : array
    {
        $photos = new Photos($this->key, $id);

        return $photos->getPictures($size);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getSpecs(int $id) : array
    {
        $specs = new Specs($this->key, $id);

        return $specs->getSpecifications();
    }

    public function getReviews(int $id, int $quantity = 10, int $min = 0) : array
    {
        $reviews = new Reviews($this->key, $id, $quantity, $min);

        return $reviews->getReviews();
    }
}