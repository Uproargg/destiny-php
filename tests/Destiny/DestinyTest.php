<?php

namespace Destiny;

class DestinyTest extends TestCase
{
    /**
     * Test the fetchPlayer method.
     */
    public function testFetchPlayer()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test the playerExists method.
     */
    public function testPlayerExists()
    {
        $playerExists = $this->destinyClient()->playerExists('Player', 1);

        $this->assertInternalType('bool', $playerExists);
    }
}
