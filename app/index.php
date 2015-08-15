<?php

use App\Classes\APICalls\APIGets;

require_once __DIR__ . '/../vendor/autoload.php';

//mcGet = minecraftGet
$mcGet = new APIGets;


//example of calling the ID of the name "Mojang" from the minecraft API
echo 'ID of name "Mojang":<br />'.$mcGet->getIDfromName('Mojang');