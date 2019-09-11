<?php
/**
 * @see https://market-scanner.ru/doc/reviews
 */
namespace MarketScanner\Model;

class Reviews extends Base {

    protected $id;

    /**
     * @var array
     */
    protected $reviews;

    public function __construct(string $key, int $id, int $quantity = 10)
    {
        $this->setEntityUrl('/reviews');

        parent::__construct([
            'key' => $key,
            'id' => $id,
            'quantity' => $quantity
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
     * @param int $min
     *
     * @return array
     */
    public function getReviews(int $min = 0) : array
    {
        $reviews =  $this->reviews ?? [];

        if ($min && $reviews) {
            $_reviews = [];
            foreach ($reviews as $reviewIndex => $review) {
                if ($review->rating >= $min) {
                    $_reviews[] = $review;
                }
            }

            $reviews = $_reviews;
        }

        return $reviews;
    }
}