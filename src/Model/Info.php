<?php
/**
 * @link https://ymscanner.ru/doc/info
 */
namespace MarketScanner\Model;

class Info extends Base {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $category_id;

    /**
     * @var int
     */
    protected $brand_id;

    /**
     * @var int
     */
    protected $specs_quantity;

    /**
     * @var int
     */
    protected $reviews_quantity;

    /**
     * @var int
     */
    protected $photos_quantity;

    /**
     * @var string
     */
    protected $rating;

    /**
     * @var int|null
     */
    protected $modof;

    /**
     * @var int
     */
    protected $price;

    /**
     * @var \Datetime
     */
    protected $price_updated;

    public function __construct(string $key, int $id)
    {
        $this->setEntityUrl('/info');

        parent::__construct([
            'key' => $key,
            'id' => $id,
        ]);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name ?? '';
    }

    /**
     * @param $name
     *
     * @return Info
     */
    public function setName($name) : self
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url ?? '';
    }

    /**
     * @param $url
     *
     * @return Info
     */
    public function setUrl($url) : self
    {
        $this->url = (string) $url;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId() : int
    {
        return $this->category_id ?? 0;
    }

    /**
     * @param $categoryId
     *
     * @return Info
     */
    public function setCategoryId($categoryId) : self
    {
        $this->category_id = (int) $categoryId;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId() : int
    {
        return $this->brand_id ?? 0;
    }

    /**
     * @param $brandId
     *
     * @return Info
     */
    public function setBrandId($brandId) : self
    {
        $this->brand_id = (int) $brandId;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpecsQuantity() : int
    {
        return $this->specs_quantity ?? 0;
    }

    /**
     * @param $specsQuantity
     *
     * @return Info
     */
    public function setSpecsQuantity($specsQuantity) : self
    {
        $this->specs_quantity = (int) $specsQuantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getReviewsQuantity() : int
    {
        return $this->reviews_quantity ?? 0;
    }

    /**
     * @param $reviewQuantity
     *
     * @return Info
     */
    public function setReviewsQuantity($reviewQuantity) : self
    {
        $this->reviews_quantity = (int) $reviewQuantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhotosQuantity() : int
    {
        return $this->photos_quantity ?? 0;
    }

    /**
     * @param $photosQuantity
     *
     * @return Info
     */
    public function setPhotosQuantity($photosQuantity) : self
    {
        $this->photos_quantity = (int) $photosQuantity;

        return $this;
    }

    /**
     * @return string
     */
    public function getRating() : string
    {
        return $this->rating ?? '';
    }

    /**
     * @param $rating
     *
     * @return Info
     */
    public function setRating($rating) : self
    {
        $this->rating = (string) $rating;

        return $this;
    }

    /**
     * @return int
     */
    public function getModof() : int
    {
        return $this->modof ?? 0;
    }

    /**
     * @param $modof
     *
     * @return Info
     */
    public function setModof($modof) : self
    {
        $this->modof = (int) $modof;

        return $this;
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