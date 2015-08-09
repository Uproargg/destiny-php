<?php

namespace Destiny\Support\Collections;

use Destiny\Destiny;
use Destiny\TestCase;

class CharacterCollectionTest extends TestCase
{
    /**
     * Test the getByClassHash method.
     */
    public function testGetByClassHash()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertInternalType('array', $characterCollection->getWarlocks());
    }

    /**
     * Test the firstByClassHash method.
     */
    public function testFirstByClassHash()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertInstanceOf('Destiny\Game\Character', $characterCollection->firstTitan());
    }

    /**
     * Test the count method.
     */
    public function testCount()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertEquals(3, $characterCollection->count());
    }
}
