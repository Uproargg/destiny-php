<?php

namespace Destiny\Game;

use Destiny\Destiny;
use Destiny\TestCase;

class InventoryTest extends TestCase
{
    /**
     * Test the makeItem method.
     */
    public function testMakeItem()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $inventory = $character->inventory;

        $this->assertInstanceOf('Destiny\Game\Item', $inventory->subclass());
        $this->assertInstanceOf('Destiny\Game\Item', $inventory->primary());
        $this->assertInstanceOf('Destiny\Game\Item', $inventory->helmet());
        $this->assertInstanceOf('Destiny\Game\Item', $inventory->ship());
    }

    /**
     * Test the glimmer, vanguardMarks and crucibleMarks methods.
     */
    public function testMarksAndGlimmer()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $inventory = $character->inventory;

        $this->assertInternalType('int', $inventory->glimmer());
        $this->assertInternalType('int', $inventory->crucibleMarks());
        $this->assertInternalType('int', $inventory->vanguardMarks());
    }

    /**
     * Test the weapons and armor methods.
     */
    public function testCollectionMethods()
    {
        $player = $this->destinyClient()->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $inventory = $character->inventory;

        $this->assertInternalType('array', $inventory->weapons());
        $this->assertInternalType('array', $inventory->armor());
        $this->assertCount(3, $inventory->weapons());
        $this->assertCount(4, $inventory->armor());
    }
}
