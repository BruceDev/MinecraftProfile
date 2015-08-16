<?php namespace Minecraft\Classes;

use GuzzleHttp\Client;

class GuzzleStart
{
    private $baseUri;
    public $client;


    public function __construct()
    {
        $this->client = $this->clientSetup();
    }

    private function configure()
    {   
        if(file_exists(__DIR__ . '/../Config/Config.php')) {
            $config = require_once(__DIR__ . '/../Config/Config.php');
        }else {
            return false;
        }


        //make sure all config variables being used are not null
        if(is_null($config['baseUri'])) {
           return false;
        }

        //sets class properties up using the config array in Config.php
        $this->baseUri = $config['baseUri'];
        return true;
    }

    private function clientSetup()
    {
        if(!$this->configure()) {
            //error here
            return "Error setting up config";
        }

        $client = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => 2.0
        ]);

        if(!$client) {
            return "Error setting up guzzle client!";
        }

        return $client;
    }
}