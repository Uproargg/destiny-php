<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->addPsr4('Destiny\\', __DIR__.'/Destiny');

$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
$dotenv->load();

date_default_timezone_set('UTC');
