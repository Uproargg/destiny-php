A PHP API for Destiny The Game
===========


http://www.bungie.net/Platform/Destiny/Stats/ActivityHistory/1/4611686018429562661/2305843009218493070/

http://www.bungie.net/Platform/Destiny/Stats/ActivityHistory/2/4611686018429149347/2305843009215132906/?page=0&count=1&definitions=true&mode=4


[![Build Status](https://travis-ci.org/aFreshMelon/destiny-php.svg)](https://travis-ci.org/aFreshMelon/destiny-php)

* [Basic Usage](#basic-usage)
* [Documentation](#documentation)
    * [Players](#players)
    * [Characters](#characters)
        * [Activity Data](#activity-data)
    * [Inventory](#inventory)

This is an easy to use PHP API to access all sorts of information about any Destiny account. 
This includes characters equipment, progression and all sorts of other information.

# Basic Usage

Install the latest version with `composer require afreshmelon/destiny dev-master`

```php
<?php

require 'vendor/autoload.php';

use Destiny\Destiny;

// Create a new instance of the client
$destiny = new Destiny;

// Find a player
$player = $destiny->fetchXboxPlayer('aFreshMelon');

// Get the first character
$firstCharacter = $player->characters->first();

// Output the characters level
echo $firstCharacter->characterLevel;
```

# Documentation

## Players

You can find any Destiny player on the Xbox or the PlayStation. 
This does not disclose whether a player is on Xbox One or Xbox 360 / PS4 or PS3, they are treated equally.

To fetch a player you will need to create a new instance of the \Destiny\Destiny class, the base class
of the API. This class has multiple functions for working with players.

To find a player on any Xbox console just use the ``fetchXboxPlayer`` method. This method is
``fetchPsnPlayer`` if you wanted to find players from any PlayStation console.

```php
$xboxPlayer = $destiny->fetchXboxPlayer('Player Name'); 
// Returns an object of type \Destiny\Game\Player

$psnPlayer = $destiny->fetchPsnPlayer('Player_Name'); 
// Returns an object of type \Destiny\Game\Player
```

If you would maybe like user selected search system, there is a method that allows you to dynmaically
specify the system to look on. This method is called ``fetchPlayer`` and works very much in the same way,
all that's different is that it accepts one additional parameter for the system as a numeric value.

```php
// The second parameter can either be 1 (Xbox) or 2 (PSN)
$anyPlayer = $destiny->fetchPlayer('PlayerName', 2); 
// Returns an object of type \Destiny\Game\Player
```

*If any of these fail an exception will be thrown (``\Destiny\Support\Exceptions\PlayerNotFoundException``).*

In case you are not looking to actually fetch a player but instead to see if a player exists you can use the
``playerExists`` method that will return a boolean. This method also requires the platform of the player.

```php
$playerExists = $destiny->playerExists('PlayerName', 1); 
// Returns either true or false
```

After retrieving a player you will have a new instance of \Destiny\Game\Player which also has a variety of
functions and will provide a lot of info about players.

It has a few properties that come directly from Bungie that you can access as regular public properties, they are
all fairly self explanatory. Those properties are ``iconPath``, ``membershipType``, ``membershipId`` and ``displayName``.

```php
echo $player->iconPath;
// Returns a relative URL to bungie.net to the players Bungie profile picture

echo $player->membershipType;
// Returns an integer that represents the platform the player is on (1 Xbox, 2 PSN)

echo $player->membershipId;
// Returns an integer that is the unique ID of the player in Destiny

echo $player->displayName;
// Returns a string containing the display name of the player
```

The class also has one function available that will let you translate the membership type from a numeric value
to a string value. This string value is used internally to make following requests to Bungie and is likely of no use
to most people, but it's there.

```php
echo Player::makeTypeWord($player->membershipType);
// Static function, returns a string representation of the platform preceeded by "Tiger"
```

The Player class has one more property called ``characters``. Once initialized the Player class will automatically
fetch all characters associated with it from Bungie and store them as a ``\Destiny\Support\Collections\CharacterCollection``
in the ``characters`` property. The functionality of this is explained in the next section.

## Characters

A players characters can be accessed through a character collection (``\Destiny\Support\Collections\CharacterCollection``)
which is automatically filled and available in any fetched Player class as the ``characters`` property.

A collection is like a super-array, it has a variety of functions for easy handling of many characters including things like
fetching classes.

The CharacterCollection contain any amount of ``\Destiny\Game\Character`` instances, if it's not altered it will contain the amount of
characters the fetched player has. In order to work with a specific character you will need to fetch it from the collection.

There is a variety of methods to fetch characters from the CharacterCollection. To fetch the character that the player last played
with for example you would use the ``first`` method. You can also use the ``firstWarlock``, ``firstTitan`` or ``firstHunter`` methods
which will all return a single Character of the obvious class. This is especially useful if you have guardians of different types.

```php
$characters = $player->characters;

$lastPlayedCharacter = $characters->first();
// Returns an object of type \Destiny\Game\Character

$lastPlayedWarlock = $characters->firstWarlock();
// Returns an object of type \Destiny\Game\Character
```

You can of course, in the very same way, retrieve all Warlocks, Titans or Hunters at once, or even all characters in the
collection. The methods for this are pretty straightforward, they are ``getWarlocks``, ``getTitans`` and ``getWarlocks``.
These will all return a new CharacterCollection containing only the characters of the specific class. If you want all characters
in the collection you would use the ``all`` method, which will return an array of all the characters in the collection.

```php
$allWarlocks = $characters->getWarlocks();
// Returns an object of type \Destiny\Support\Collections\CharacterCollection

$allCharacters = $characters->all();
// Returns an array
```

You can also get the last character in the collection using the ``last`` method or get any character by it's index
in the collection using the ``get`` method. Additionally you can count how many characters a player has with the
``count`` method.

```php
$lastCharacters = $characters->last();
// Returns an object of type \Destiny\Game\Character

$allCharacters = $characters->get(2);
// Returns the third character in the collection as an object of type \Destiny\Game\Character

$numberOfCharacters = $characters->count();
// Returns an integer that represents how many characters are in the collection
```

Once you retrieved a character from the collection you will be working with an object of type \Destiny\Game\Character
which does not really have any major methods. It also has the static ``makeTypeWord`` method, which again, is mostly for
internal use.

The character class does however allow accessing all of the characters important data. It will be expanded in the the future,
but right now this includes all general data as well as the [Inventory](#inventory).

There are way too many things the Character class has, so I will only list a few of the important one's. You can always
var_dump an instance of a Character class and see what else it has in store.

Some of the important character properties are ``characterLevel``, ``dateLastPlayed``, ``characterId``, ``classHash`` and 
``minutesPlayedThisSession``. Those are only a few of the many properties it has, so again, go explore.

```php
$character = $characters->first();

echo $character->characterLevel;
// Returns an integer representing the character's level

echo $character->classHash;
// Returns an integer representing a class
```

Now you may be looking in the example above and stumbling over ``classHash``. This is infact an unreadable integer that
represents the class of the character. You can't do much with it alone, but luckily with the package comes a HashTranslator
that can translate this and a few more hashes to words.

Simply create a new instance of ``\Destiny\Support\Translators\HashTranslator`` and use the ``translate`` method on a hash.
You might find more hashes, this translator only works for a few. Many of Destiny's hashes are dynamic and have really long array
values.

```php
$translator = new HashTranslator;

echo $translator->translate($character->classHash);
// Returns a string that is the class of the character as a word

echo $translator->reverse($character->classHash);
// Reverts the word back to a hash
```

The character class is packed with information, perhaps one of the most important infos comes from another class that
can be accessed from the ``inventory`` property within the Character class.

### Activity Data

An interface to retrieve activity data is provided out of the box. As there is lots of activity data on every single character
it is not fetched automatically. Instead there is a function for you to easily retrieve all sorts of activity data.

There are many types of activity data, so here is a list with your options for the ``fetchActivityData`` method on the Character class.

| ID |                 |
|----|-----------------|
| 1  | None            |
| 2  | Story           |
| 3  | Strike          |
| 4  | Raid            |
| 5  | AllPvP          |
| 6  | Patrol          |
| 7  | AllPvE          |
| 8  | PvPIntroduction |
| 9  | ThreeVsThree    |
| 10 | Control         |
| 11 | Lockdown        |
| 12 | Team            |
| 13 | FreeForAll      |
| 14 | Nightfall       |
| 15 | Heroic          |
| 16 | AllStrikes      |

You can then use the method to retrieve a response array directly from Bungie and do whatever like with it. This let's you determine raid completions,
story completions, nightfall completions and all sorts of PvP data too. It's super useful if you want to collect some stats.

```php
$character = $player->characters->first();

$raidData = $character->fetchActivityData(4);
// Returns an array containing stats about past raids

$controlData = $character->fetchActivityData(10);
// Returns an array containing stats about past Control matches
```

## Inventory

The inventory is one of the most important things about a Destiny character. It is available from the ``inventory`` property
in the Character class and is an object of type ``\Destiny\Game\Inventory``. It contains all important information about
weapons, armor and all the other stuff you might find in someone's public inventory.

All of the inventory's methods return instances of ``\Destiny\Game\Item`` that are simply "holder" of information. You can access
the items using methods of the Inventory class. There are a lot of pretty clearly named methods that fetch whatever item you're asking
for. The naming is so simple, I will only list a few and you can figure out the rest or dig in the code.

```php
$inventory = $character->inventory;

$primaryWeapon = $inventory->primary();
// Returns an object of type \Destiny\Game\Item that is the primary weapon

$subclass = $inventory->subclass();
// Returns an object of type \Destiny\Game\Item that is the subclass

$classItem = $inventory->classItem();
// Returns an object of type \Destiny\Game\Item that is the class item

// And the other one's should be sort of obvious...
```

I will reiterate, you can always look in the code if you can't find what you're looking for.

The Inventory class also has 3 different functions. They return integer values of the Glimmer and the Marks of a character.
Very surprisingly their names are ``glimmer``, ``crucibleMarks`` and ``vanguardMarks``.

```php
$vanguardMarks = $inventory->vanguardMarks();
// Returns an integer
```

The fetched instances of ``\Destiny\Game\Item`` then have properties describing the items. Again, these are too many to list
so I will only list a few important one's and you can figure out the rest. Some of them are ``itemHash``, ``itemName``, ``itemDescription``, 
``icon`` and ``itemTypeName``. Of course there are also item specific properties and so on, I strongly recommend looking at
all these classes further.

```php
$item = $inventory->secondary();

echo $item->itemName;
// Returns a string that is the item's name

echo $item->itemTypeName;
// Returns a string that represents the rarity of the item e.g. "Exotic"
```

**This documentation is unfinished and will be expanded with the project.**