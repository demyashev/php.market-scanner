<?php

namespace MarketScanner\Model\HTTP;

use Exception;
use stdClass;

class Request {

    const URL = 'https://market-scanner.ru/api';

    /**
     * Final query URL
     *
     * @var string
     */
    private $url;

    /**
     * Post params key => value
     *
     * @var array
     */
    private $data = [];

    /**
     * Make POST request
     *
     * @return stdClass decoded json
     */
    public function exec() : stdClass
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post(
                $this->getUrl(),
                $this->getData()
            );

            $responseBody = (string) $response->getBody();

            return (new Response($responseBody))->as_object();
        }
        catch (Exception $e) {
            die("{$e->getFile()}:{$e->getLine()} {$e->getMessage()}");
        }
    }

    /**
     * @param array $data
     *
     * @return Request
     */
    public function setData(array $data) : self
    {
        $this->data += $data;

        return $this;
    }

    /**
     * @param string $url
     *
     * @return Request
     */
    public function setUrl(string $url) : self
    {
        $this->url = self::URL . $url;

        return $this;
    }

    /**
     * @return string
     */
    private function getUrl() : string
    {
        return $this->url ?? '';
    }

    /**
     * @return array
     */
    private function getData() : array
    {
        $data = [
            'form_params' => $this->data
        ];

        return $data;
    }
}