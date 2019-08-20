<?php

namespace MarketScanner\Model\HTTP;

use Exception;
use stdClass;

class Response {

    /**
     * @var string
     */
    private $_response;

    /**
     * @var stdClass
     */
    private $_object;

    /**
     * Response constructor.
     *
     * @param string $response
     *
     * @throws Exception
     */
    public function __construct($response)
    {
        try {
            $this->_object = json_decode($response);
            $this->_response = $response;
        }
        catch (Exception $e) {
            die("{$e->getFile()}:{$e->getLine()} {$e->getMessage()}");
        }

        if (isset($this->_object->error)) {
            throw new Exception($this->_object->error);
        }
    }

    /**
     * @return stdClass
     */
    public function as_object() : stdClass
    {
        return $this->_object;
    }

    /**
     * @return string
     */
    public function as_string() : string
    {
        return $this->_response;
    }
}