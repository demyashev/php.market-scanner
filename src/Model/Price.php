<?php
/**
 * @link https://ymscanner.ru/doc/price
 */
namespace MarketScanner\Model;

class Price extends Base {
    /**
     * @var int
     */
    protected $price;

    /**
     * @var \Datetime
     */
    protected $price_updated;

    public function __construct(string $key, int $id, bool $autoload = true)
    {
        $this->setEntityUrl('/price');

        parent::__construct([
            'key' => $key,
            'id' => $id,
        ], $autoload);
    }

    /**
     * @return int
     */
    public function getPrice() : int
    {
        return $this->price ?? 0;
    }

    /**
     * @param $price
     *
     * @return Info
     */
    public function setPrice($price) : self
    {
        $this->price = (int) $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getPriceUpdated() : string
    {
        return $this->price_updated ?? '';
    }

    /**
     * @param $priceUpdated
     *
     * @return Info
     */
    public function setPriceUpdated($priceUpdated) : self
    {
        $this->price_updated = (string) $priceUpdated;

        return $this;
    }
}