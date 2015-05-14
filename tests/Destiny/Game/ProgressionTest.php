<?php namespace Destiny\Game;

use Destiny\Destiny;
use Destiny\TestCase;

class ProgressionTest extends TestCase
{

    /**
     * Test the magic getter.
     */
    public function testMagicGetter()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $progression = $character->progression;

        $eris = $progression->get('eris');

        $this->assertInternalType('bool', $eris->repeatLastStep);
    }

    /**
     * Test the total steps.
     */
    public function testTotalSteps()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $progression = $character->progression;

        $level = $progression->get('character_level');

        $this->assertInternalType('int', $level->totalSteps);
        $this->assertEquals(20, $level->totalSteps);
    }

}
