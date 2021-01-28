<?php
/**
 * @see https://ymscanner.ru/doc/specs
 */
namespace MarketScanner\Model;

class Specs extends Base {

    /**
     * @var array
     */
    protected $specifications;

    /**
     * Specs constructor.
     *
     * @param string $key
     * @param int    $id
     */
    public function __construct(string $key, int $id)
    {
        $this->setEntityUrl('/specs');

        parent::__construct([
            'key' => $key,
            'id' => $id,
        ]);
    }

    /**
     * @param \stdClass $specifications
     *
     * @return Specs
     */
    public function setSpecifications($specifications) : self
    {
        $this->specifications = (array) $specifications;

        return $this;
    }

    /**
     * @return array
     */
    public function getSpecifications() : array
    {
        return $this->specifications ?? [];
    }
}