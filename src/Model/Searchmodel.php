<?php
/**
 * @link https://ymscanner.ru/doc/searchmodel
 */
namespace MarketScanner\Model;

class Searchmodel extends Info {

    /**
     * @var string
     */
    protected $category_name;

    /**
     * @var string
     */
    protected $brand_name;

    public function __construct(string $key, string $search)
    {
        $this->setEntityUrl('/searchmodel');
        $this->setData([
           'key' => $key,
           'search' => $search
        ]);
        $this->getFromAPI();
    }

    /**
     * @return string
     */
    public function getCategoryName() : string
    {
        return $this->category_name ?? '';
    }

    /**
     * @param $name
     *
     * @return Searchmodel
     */
    public function setCategoryName(string $name) : self
    {
        $this->category_name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrandName() : string
    {
        return $this->brand_name ?? '';
    }

    /**
     * @param string $name
     *
     * @return Searchmodel
     */
    public function setBrandName(string $name) : self
    {
        $this->brand_name = $name;

        return $this;
    }
}