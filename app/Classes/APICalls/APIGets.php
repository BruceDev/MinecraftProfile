<?php namespace App\Classes\APICalls;

use App\Classes\GuzzleStart;

class APIGets extends GuzzleStart
{
    const uriPath = 'users/profiles/minecraft/';

    public function getIDfromName($name = null)
    {

        if(is_null($name)) {
            return null;
        }

        $fullPath = self::uriPath . $name;
        try {
            $response = $this->client->get($fullPath);
            $response = json_decode($response->getBody());
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return null;
        }

        if(is_null($response)) {
            return null;
        }

        //return id
        return $response->id;

    }
}