<?php

require 'vendor/autoload.php';

use Destiny\Destiny;

$destiny = new Destiny;

$player = $destiny->fetchXboxPlayer('aFreshMelon');

$firstCharacter = $player->characters->first();

var_dump($firstCharacter->inventory->classSetup());