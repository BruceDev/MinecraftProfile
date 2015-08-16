<?php namespace Minecraft\Libraries;



//classes
use Minecraft\Classes\GuzzleStart;

class MinecraftAPI extends GuzzleStart implements APIGets_Interface, APIPosts_Interface
{
    const GetsUri = 'users/profiles/minecraft/';

    public function getIDfromName($name = null)
    {
        $callPath = self::GetsUri . $name;

        try {
            $response = $this->client->get($callPath);
            $response = json_decode($response->getBody());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return null;
        }

        if(is_null($response)) {
            return null;
        }

        return $response->id;
    }


    public function postTest()
    {
        return "testing";
    }
}