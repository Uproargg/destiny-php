<?php namespace Destiny\Game;

use Destiny\Destiny;
use Destiny\TestCase;

class PlayerTest extends TestCase
{

    /**
     * Test the fetchCharacters method.
     */
    public function testFetchCharacters()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $this->assertInstanceOf('Destiny\Support\Collections\CharacterCollection', $player->characters);
        $this->assertCount(3, $player->characters->all());
    }

    /**
     * Test the fetchGrimoireData method.
     */
    public function testFetchGrimoireData()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $grimoireData = $player->fetchGrimoireData();

        $this->assertInternalType('array', $grimoireData);
        $this->assertArrayHasKey('cardCollection', $grimoireData['Response']['data']);
    }

}
