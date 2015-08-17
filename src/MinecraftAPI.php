<?php namespace Minecraft;

use Minecraft\src\Http\GuzzleClientSetup;

class MinecraftAPI extends GuzzleClientSetup
{
    const UsersURI = 'users/profiles/minecraft/';

    public function getIDbyName($name = null)
    {
        $callPath = self::UsersURI . $name;

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
}