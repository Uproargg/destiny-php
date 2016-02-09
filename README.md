# Destiny API wrapper in PHP

*THIS PACKAGE IS NO LONGER MAINTAINED!*

[![Build Status](https://img.shields.io/travis/sebastianbarfurth/destiny-php.svg)](https://travis-ci.org/sebastianbarfurth/destiny-php) 
[![Latest Stable Version](https://img.shields.io/packagist/v/sebastianbarfurth/destiny.svg?label=latest%20stable)](https://packagist.org/packages/sebastianbarfurth/destiny) 
[![Downloads](https://img.shields.io/packagist/dt/sebastianbarfurth/destiny.svg)](https://packagist.org/packages/sebastianbarfurth/destiny)

* [Basic Usage](#basic-usage)
* [Documentation](#documentation)
    * [Players](#players)
        * [Grimoire Data](#grimoire-data)
    * [Characters](#characters)
    	* [Progression / Vendors](#progression--vendors)
        * [Activity Data](#activity-data)
        * [Post Game Carnage Reports](#post-game-carnage-reports)
    * [Inventory](#inventory)
* [Copyright and license](#copyright-and-license)

This is an easy to use PHP wrapper for the Destiny API by Bungie. 
This includes characters equipment, progression and all sorts of other information.

## Basic Usage

Install the latest stable version with `composer require sebastianbarfurth/destiny`

```php
<?php

// Include the autoloader
require 'vendor/autoload.php';

// Create a new instance of the client
$destiny = new \Destiny\Destiny('YOUR_API_KEY');

// Find a player
$player = $destiny->fetchXboxPlayer('aFreshMelon');

// Get the first character
$firstCharacter = $player->characters->first();

// Output the characters level
echo $firstCharacter->characterLevel;
```

## Documentation

### Players

You can find any Destiny player on the Xbox or the PlayStation. 
This does not disclose whether a player is on Xbox One or Xbox 360 / PS4 or PS3, they are treated equally.

To fetch a player you will need to create a new instance of the ``\Destiny\Destiny class``, the base class
of the API. This class has multiple functions for working with players.

To find a player on any Xbox console just use the ``fetchXboxPlayer`` method. This method is
``fetchPsnPlayer`` if you wanted to find players from any PlayStation console.

```php
$xboxPlayer = $destiny->fetchXboxPlayer('Player Name'); // Destiny\Game\Player

$psnPlayer = $destiny->fetchPsnPlayer('Player_Name'); // Destiny\Game\Player
```

If you would maybe like user selected search system, there is a method that allows you to dynmaically
specify the system to look on. This method is called ``fetchPlayer`` and works very much in the same way,
all that's different is that it accepts one additional parameter for the system as a numeric value.

Platforms are identified with a numeric value. The number for Xbox is 1 and the number for PlayStation is 2.
This is the case throughout the entire system.

```php
$anyPlayer = $destiny->fetchPlayer('PlayerName', 2); // Destiny\Game\Player
```

*If any of these fail this exception will be thrown: ``\Destiny\Support\Exceptions\PlayerNotFoundException``.*

In case you are not looking to actually fetch a player but instead to see if a player exists you can use the
``playerExists`` method that will return a boolean. This method also requires the platform of the player.

```php
$playerExists = $destiny->playerExists('PlayerName', 1); // boolean
```

After retrieving a player you will have a new instance of ``\Destiny\Game\Player`` which also has a variety of
functions and will provide a lot of info about players.

It has a few properties that come directly from Bungie that you can access as regular public properties, they are
all fairly self explanatory. Those properties are ``iconPath``, ``membershipType``, ``membershipId`` and ``displayName``.

```php
echo $player->iconPath; // string

echo $player->membershipType; // integer

echo $player->membershipId; // integer

echo $player->displayName; //string
```

The Player class has one more property called ``characters``. Once initialized the Player class will automatically
fetch all characters associated with it from Bungie and store them as a ``\Destiny\Support\Collections\CharacterCollection``
in the ``characters`` property. The functionality of this is explained in the next section.

#### Grimoire Data

You can easily access a player's Grimoire score using the ``grimoireScore`` property on an character, but sometimes you
might want some more detail about a player's Grimoire data.

There is a method to easily let you retrieve an array of a player's grimoire breakdown with card descriptions and all the
data available about the cards, including graphics paths to bungie.net.

The Grimoire data is very heavy and fairly situational, so it will not be requested by default, instead you can request
it at your own will using the ``fetchGrimoireData`` method which will return a massive array of cards and info.

```php
$grimoireData = $player->fetchGrimoireData(); // array
```

### Characters

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
$characters = $player->characters; // Destiny\Support\Collections\CharacterCollection

$lastPlayedCharacter = $characters->first(); // Destiny\Game\Character

$lastPlayedWarlock = $characters->firstWarlock(); // Destiny\Game\Character
```

You can of course, in the very same way, retrieve all Warlocks, Titans or Hunters at once, or even all characters in the
collection. The methods for this are pretty straightforward, they are ``getWarlocks``, ``getTitans`` and ``getWarlocks``.
These will all return an array containing only the characters of the specific class. If you want all characters
in the collection you would use the ``all`` method, which will return an array of all the characters in the collection.

```php
$allWarlocks = $characters->getWarlocks(); // array

$allCharacters = $characters->all(); // array
```

You can also get the last character in the collection using the ``last`` method or get any character by it's index
in the collection using the ``get`` method. Additionally you can count how many characters a player has with the
``count`` method.

```php
$lastCharacters = $characters->last(); // Destiny\Game\Character

$allCharacters = $characters->get(2); // Destiny\Game\Character

$numberOfCharacters = $characters->count(); // integer
```

Once you retrieved a character from the collection you will be working with an object of type ``\Destiny\Game\Character``
which does not really have any major methods.

The character class does however allow accessing all of the characters important data. It will be expanded in the the future,
but right now this includes all general data as well as the [Inventory](#inventory).

There are way too many things the Character class has, so I will only list a few of the important one's. You can always
var_dump an instance of a Character class and see what else it has in store.

Some of the important character properties are ``characterLevel``, ``dateLastPlayed``, ``characterId``, ``classHash`` and 
``minutesPlayedThisSession``. Those are only a few of the many properties it has, so again, go explore.

```php
echo $character->characterLevel; // integer

echo $character->classHash; // integer
```

Now you may be looking in the example above and stumbling over ``classHash``. This is infact an unreadable integer that
represents the class of the character. You can't do much with it alone, but luckily with the package comes a HashTranslator
that can translate this and a few more hashes to words.

Simply create a new instance of ``\Destiny\Support\Translators\HashTranslator`` and use the ``translate`` method on a hash.
You might find more hashes, this translator only works for a few. Many of Destiny's hashes are dynamic and have really long array
values.

```php
$translator = new \Destiny\Support\Translators\HashTranslator;

echo $translator->translate($character->classHash); // string

echo $translator->reverse($character->classHash); // integer
```

The character class is packed with information, perhaps one of the most important infos comes from another class that
can be accessed from the ``inventory`` property within the Character class.

#### Progression / Vendors

With every character the progression data is also fetched. It contains all sorts of useful information, most useful are probably the
vendor levels and progressions that are all included with it. Every progression type is stored as an object and they all contain unique information. The following progressions are available:

| Key to retrieve                | Description                               |
|--------------------------------|-------------------------------------------|
| ban_idle                       | ban progression for idling                |
| ban_quit                       | Ban progression for quits                 |
| base_item_level                | Base item level                           |
| character_display_xp           | Character display XP                      |
| character_level                | Character level                           |
| character_prestige             | Character prestige                        |
| death_penalty                  | Death Penalty                             |
| chests_cosmodrome              | Chests on Earth                           |
| chests_mars                    | Chests on Mars                            |
| chests_moon                    | Chests on the Moon                        |
| chests_venus                   | Chests on Venus                           |
| cryptarch                      | Faction: Cryptarch                        |
| eris                           | Faction: Eris (The Dark Below)            |
| iron_banner                    | Event: Iron Banner                        |
| queen_event                    | Event: Queen's Wrath                      |
| vanguard                       | Faction: Vanguard                         |
| crucible                       | Faction: Crucible                         |
| dead_orbit                     | Faction: Dead Orbit                       |
| fwc                            | Faction: Future War Cult                  |
| new_monarchy                   | Faction: New Monarchy                     |
| iron_banner_loss_tokens        | Iron Banner loss tokens                   |
| pvp_tournament0_losses         | Tournament 0 losses                       |
| pvp_tournament0_wins           | Tournament 0 wins                         |
| fallen                         | Faction: Fallen (House of Wolves)         |
| queen                          | Faction: Queen (House of Wolves)          |
| superior_gear_material_source  | Superior gear material source             |
| terminals                      | Terminals                                 |
| trials_of_osiris_wins          | Trials of Osiris wins (House of Wolves)   |
| trials_of_osiris_losses        | Trials of Osiris losses (House of Wolves) |
| weekly_pve                     | Weekly PVE progression                    |
| weekly_pvp                     | Weekly PVP progression                    |
| test_faction                   | A test faction from Bungie                |

You may retrieve the progression for any of the above keys.

```php
$progression = $character->progression; // Destiny\Support\Collections\ProgressionCollection

$crucibleProgression = $progression->get('crucible'); // Destiny\Game\Progression

$erisProgression = $progression->get('eris'); // Destiny\Game\Progression
```

The returned objects of the ``Destiny\Game\Progression`` contain a lot of data. Their data is available as properties, so you may request any of the following simply as a property of the ``Destiny\Game\Progression`` object.

| Property name       | Return type | Description                                        |
|---------------------|-------------|----------------------------------------------------|
| dailyProgress       | integer     | XP for this progression today                      |
| weeklyProgress      | integer     | XP for this progression this week                  |
| currentProgress     | integer     | XP for this progression in total                   |
| level               | integer     | Level for this progression                         |
| step                | integer     | Step of this progression                           |
| progressToNextLevel | integer     | XP progress toward next level of this progression  |
| nextLevelAt         | integer     | XP needed to reach next level of this progression  |
| progressionHash     | integer     | Hash of this progression                           |
| name                | string      | Name of this progression as given by Bungie        |
| scope               | integer     | Scope of this progression                          |
| repeatLastStep      | boolean     | Whether this progression repeats it's last step    |
| icon                | string      | Path to the icon for this progression (not on all) |
| identifier          | string      | This progression's identifier (not on all)         |
| steps               | array       | Steps for this progression                         |

To get any of those properties you simply retrieve them from the ``Destiny\Game\Progression`` object like you would any other property.

```php
$fwcProgression = $progression->get('fwc'); // Destiny\Game\Progression

$fwcLevel = $fwcProgression->level; // integer

$fwcProgressToNextLevel = $fwcProgression->progressToNextLevel; // integer
```

Progression data is extremely powerful and rich, it contains stuff that isn't even on the public interface (yet?) like ban progressions and DLC factions.

#### Activity Data

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
story completions, nightfall completions and all sorts of PvP data too. It's super useful if you want to collect some stats. These methods
accept a second argument that will allow you to also receive definitions (name, type, all sorts of info) about every activity returned.
It's set to true by default and it is suggested to leave it set to true.

```php
$raidData = $character->fetchActivityData(4); // array

$controlData = $character->fetchActivityData(10); // array

$controlDataWithoutExtraInfo = $character->fetchActivityData(10, false); // array
```

#### Post Game Carnage Reports

Post game carnage reports for crucible matches and all other activities can be received with a helper method. You will need an activityId
which you can get from the ``fetchActivityData`` method described above. Then you may call ``fetchPostGameCarnageReport`` on it to receive
information about total kills, deaths and other stats. This has a switch for definitions again, it's recommended to keep it on.

```php
$rumbleData = $character->fetchActivityData(13); // array

$rumbleMatchId = $rumbleData['Response']['data']['activities'][0]['activityDetails']['instanceId']; // string

$pgcr = $character->fetchPostGameCarnageReport($rumbleMatchId); // array

$pgcrWithoutExtraInfo = $character->fetchPostGameCarnageReport($rumbleMatchId, false); // array
```

Keep in mind that the report includes closing info for every player in the activity, so you can get info about anyone who you played with
using this report.

### Inventory

The inventory is one of the most important things about a Destiny character. It is available from the ``inventory`` property
in the Character class and is an object of type ``\Destiny\Game\Inventory``. It contains all important information about
weapons, armor and all the other stuff you might find in someone's public inventory.

All of the inventory's methods return instances of ``\Destiny\Game\Item`` that are simply "holder" of information. You can access
the items using methods of the Inventory class. There are a lot of pretty clearly named methods that fetch whatever item you're asking
for. The naming is so simple, I will only list a few and you can figure out the rest or dig in the code.

```php
$inventory = $character->inventory; // Destiny\Game\Inventory

$primaryWeapon = $inventory->primary(); // Destiny\Game\Item

$subclass = $inventory->subclass(); // Destiny\Game\Item

$classItem = $inventory->classItem(); // Destiny\Game\Item
```

I will reiterate, you can always look in the code if you can't find what you're looking for.

The Inventory class also has 3 different functions. They return integer values of the Glimmer and the Marks of a character.
Very surprisingly their names are ``glimmer``, ``legendaryMarks``.

```php
$legendaryMarks = $inventory->legendaryMarks(); // integer
```

The fetched instances of ``\Destiny\Game\Item`` then have properties describing the items. Again, these are too many to list
so I will only list a few important one's and you can figure out the rest. Some of them are ``itemHash``, ``itemName``, ``itemDescription``, 
``icon`` and ``itemTypeName``. Of course there are also item specific properties and so on, I strongly recommend looking at
all these classes further.

```php
echo $item->itemName; // string

echo $item->itemTypeName; // string
```

## Copyright and license

Copyright 2015 by Sebastian Barfurth. Licensed under the [MIT license](https://github.com/sebastianbarfurth/destiny-php/blob/master/LICENSE).
