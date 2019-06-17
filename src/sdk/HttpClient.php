<?php

namespace ozerich\shop\plugins\onliner\sdk;

class HttpClient
{
    private $baseUrl;

    private $curl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    private function initCurl($curlOptions = [])
    {
        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        foreach ($curlOptions as $option => $value) {
            curl_setopt($this->curl, $option, $value);
        }

        return $this->curl;
    }

    private function exec()
    {
        $response = curl_exec($this->curl);

        $info = curl_getinfo($this->curl);

        $json = json_decode($response, true);

        return $json;
    }

    public function getRequest($url, $authorizationHeader = null)
    {
        $options = [
            CURLOPT_URL => $this->baseUrl . $url
        ];

        $httpHeaders = [
            'Accept: application/json'
        ];

        if ($authorizationHeader) {
            $httpHeaders[] = 'Authorization:' . $authorizationHeader;
        }

        $options[CURLOPT_HTTPHEADER] = $httpHeaders;

        $this->initCurl($options);

        return $this->exec();
    }

    public function postRequest($url, $body, $authorizationHeader = null, $httpAuthorization = null)
    {
        $options = [
            CURLOPT_URL => $this->baseUrl . $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($body)
        ];

        if ($httpAuthorization) {
            $options[CURLOPT_USERPWD] = $httpAuthorization[0] . ':' . $httpAuthorization[1];
        }

        $httpHeaders = [
            'Accept: application/json'
        ];

        if ($authorizationHeader) {
            $httpHeaders[] = 'Authorization:' . $authorizationHeader;
        }

        $options[CURLOPT_HTTPHEADER] = $httpHeaders;

        $this->initCurl($options);

        return $this->exec();
    }
}