<?php namespace Destiny\Game;

use Destiny\Destiny;
use Destiny\TestCase;

class CharacterTest extends TestCase
{

    /**
     * Test the fetchInventory method.
     */
    public function testFetchInventory()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $this->assertInstanceOf('Destiny\Game\Inventory', $character->inventory);
    }

    /**
     * Test the fetchProgression method.
     */
    public function testFetchProgression()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $this->assertInternalType('array', $character->progression);
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
     * Test the fetchPostGameCarnageReport method.
     */
    public function testFetchPostGameCarnageReport()
    {
        $destiny = new Destiny($this->http());

        $player = $destiny->fetchPlayer('aFreshMelon', 1);

        $character = $player->characters->first();

        $player->fetchGrimoireData(); // Working this off the Subscriber queue

        $character->fetchActivityData(4); // Working this off the Subscriber queue

        $pgcr = $character->fetchPostGameCarnageReport('1852910870');

        $this->assertInternalType('array', $pgcr);
        $this->assertArrayHasKey('activityDetails', $pgcr['Response']['data']);
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
