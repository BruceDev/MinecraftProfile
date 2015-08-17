<?php namespace Minecraft\Http;

use GuzzleHttp\Client;

class GuzzleClientSetup
{
    private $baseURI = 'https://api.mojang.com/';
    public $client;


    public function __construct()
    {
        $this->client = $this->clientSetup();
    }

    private function validateURI($uri)
    {   
        if(!filter_var($uri, FILTER_VALIDATE_URL)) {
           return false;
        }

        return true;
    }

    private function clientSetup()
    {
        if(!$this->validateURI($this->baseURI)) {
            //error here
            return "Error - bad base URI";
        }

        $client = new Client([
            'base_uri' => $this->baseURI,
            'timeout'  => 2.0
        ]);

        if(!$client) {
            return "Error setting up guzzle client!";
        }

        return $client;
    }
}