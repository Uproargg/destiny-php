<?php namespace Destiny;

class DestinyTest extends TestCase
{

    /**
     * Test the fetchPlayer method.
     */
    public function testFetchPlayer()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test the playerExists method.
     */
    public function testPlayerExists()
    {
        $destiny = new Destiny($this->http());

        $playerExists = $destiny->playerExists('Player', 1);

        $this->assertInternalType('bool', $playerExists);
    }

}
