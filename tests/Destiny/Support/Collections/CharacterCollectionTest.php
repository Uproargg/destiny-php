<?php namespace Destiny\Support\Collections;

use Destiny\TestCase;
use Destiny\Destiny;

class CharacterCollectionTest extends TestCase {

    /**
     * Test the getByClassHash method.
     */
    public function testGetByClassHash()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertInternalType('array', $characterCollection->getWarlocks());
    }

    /**
     * Test the firstByClassHash method.
     */
    public function testFirstByClassHash()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertInstanceOf('Destiny\Game\Character', $characterCollection->firstTitan());
    }

    /**
     * Test the count method.
     */
    public function testCount()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $characterCollection = $player->characters;

        $this->assertEquals(3, $characterCollection->count());
    }

}
 