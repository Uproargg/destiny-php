<?php namespace Destiny\Game;

use Destiny\Destiny;
use Destiny\TestCase;

class ItemTest extends TestCase
{

    /**
     * Test the magic getter.
     */
    public function testMagicGetter()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $inventory = $character->inventory;

        $item = $inventory->primary();

        $this->assertInternalType('string', $item->itemName);
    }

}
