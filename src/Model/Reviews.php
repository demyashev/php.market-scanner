<?php
/**
 * @see https://ymscanner.ru/doc/reviews
 */
namespace MarketScanner\Model;

class Reviews extends Base {

    protected $id;

    /**
     * @var array
     */
    protected $reviews;

    public function __construct(string $key, int $id, int $quantity = 10, int $min = 0)
    {
        $this->setEntityUrl('/reviews');

        parent::__construct([
            'key' => $key,
            'id' => $id,
            'quantity' => $quantity,
            'min' => $min,
        ]);
    }

    /**
     * @param array $reviews
     *
     * @return Reviews
     */
    public function setReviews(array $reviews) : self
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * @return array
     */
    public function getReviews() : array
    {
        return $this->reviews ?? [];
    }
}