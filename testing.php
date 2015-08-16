<?php

use Minecraft\Libraries\MinecraftAPI;

require_once __DIR__ . '/vendor/autoload.php';

//mc = minecraft
$mc = new MinecraftAPI;


//example of calling the ID of the name "Mojang" from the minecraft API
echo 'ID of name "Mojang":<br />'.$mc->getIDfromName('Mojang');