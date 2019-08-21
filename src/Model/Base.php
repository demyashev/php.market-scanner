<?php

namespace MarketScanner\Model;

use Exception;
use MarketScanner\Model\HTTP\Request;
use stdClass;

class Base {

    /**
     * API auth key
     *
     * @var string
     */
    protected $key;

    /**
     * Entity id
     *
     * @var int
     */
    protected $id;

    /**
     * Entity URL
     *
     * @var string
     */
    protected $entityUrl;

    /**
     * @var array
     */
    protected $data;

    /**
     * @return string
     */
    private function getKey() : string
    {
        return $this->key ?? '';
    }

    /**
     * Set API key
     *
     * @param string $key
     *
     * @return Base
     */
    private function setKey(string $key) : self
    {
        $this->key = (string) $key;

        return $this;
    }

    /**
     * Universal entity's property setter
     *
     * @param stdClass $object
     *
     * @return $this
     */
    protected function fill(stdClass $object)
    {
        foreach ($object as $key => $value) {
            if (property_exists($this, $key)) {

                // category_id -> СategoryId
                $keySetter = '';

                $keyExploded = explode('_', $key);

                foreach ($keyExploded as $keyExplodedItem) {
                    $keySetter .= ucfirst($keyExplodedItem);
                }

                // setCategoryId
                $keySetter = "set{$keySetter}";

                // setCategoryId(19)
                $this->$keySetter($value);
            }
        }

        return $this;
    }

    /**
     * Get info from remote API
     *
     * @return Base
     */
    protected function getFromAPI()
    {
        $request =
            (new Request())
                ->setUrl($this->getEntityUrl())
                ->setData($this->getData());
        try {
            $response = $request->exec();

            return $this->fill($response);
        }
        catch (Exception $e) {
            // die($e->getMessage());
        }
    }

    /**
     * @return string
     */
    protected function getEntityUrl() : string
    {
        return $this->entityUrl ?? '';
    }

    /**
     * @param string $entityUrl '/photos', '/info', '/balance', '/specs'
     *
     * @return Base
     */
    protected function setEntityUrl($entityUrl) : self
    {
        $this->entityUrl = (string) $entityUrl;

        return $this;
    }

    /**
     * Set POST data
     *
     * @param array $data
     *
     * @return $this
     */
    protected function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    protected function getData() : array
    {
        return $this->data ?? [];
    }

    /**
     * Base constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setData($data);

        $this->getFromAPI();
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id ?? 0;
    }

    /**
     * @param $id
     *
     * @return Base
     */
    public function setId($id) : self
    {
        $this->id = (int) $id;

        return $this;
    }

}