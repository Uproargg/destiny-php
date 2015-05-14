<?php namespace Destiny\Support\Collections;

use Destiny\Destiny;
use Destiny\TestCase;

class ProgressionCollectionTest extends TestCase
{

    /**
     * Test that the translation of keys worked.
     */
    public function testGetByTranslatedKey()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $progressionCollection = $character->progression;

        $this->assertInstanceOf('Destiny\Game\Progression', $progressionCollection->get('vanguard'));
    }

}
