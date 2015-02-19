<?php namespace Destiny\Game;

use Destiny\TestCase;
use Destiny\Destiny;

class CharacterTest extends TestCase {

    /**
     * Test the fetchInventoryMethod.
     */
    public function testFetchInventory()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $this->assertInstanceOf('Destiny\Game\Inventory', $character->inventory);
    }

    /**
     * Test the fetchActivityHistory method.
     */
    public function testFetchActivityData()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $player->fetchGrimoireData(); // Working this off the Subscriber queue

        $activityData = $character->fetchActivityData(4);

        $this->assertInternalType('array', $activityData);
        $this->assertArrayHasKey('activities', $activityData['Response']['data']);
    }

    /**
     * Test the magic getter.
     */
    public function testMagicGetter()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $this->assertEquals(32, $character->characterLevel);
    }

}
 