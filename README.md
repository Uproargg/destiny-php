A PHP API for Destiny The Game
===========

[![Build Status](https://travis-ci.org/aFreshMelon/destiny-php.svg)](https://travis-ci.org/aFreshMelon/destiny-php)

This is an easy to use PHP API to access all sorts of information about any Destiny account. 
This includes characters equipment, progression and all sorts of other information.

Usage
-----

Install the latest version with `composer require afreshmelon/destiny`

```php
<?php

require 'vendor/autoload.php';

use Destiny\Client;

// Create a new instance of the client
$destiny = new Client;

// Find a player
$player = $destiny->findXboxPlayer('aFreshMelon');

// Get the first character
$firstCharacter = $player->characters->get(0);

// Output the characters level
echo $firstCharacter->characterLevel;