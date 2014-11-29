<?php 

class FetchPlayerTest extends PHPUnit_Framework_TestCase {

    /**
     * Test fetching an Xbox player.
     *
     * @throws \Exception
     */
    public function testFetchXboxPlayer()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchXboxPlayer('aFreshMelon');

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test fetching a PSN player.
     *
     * @throws \Exception
     */
    public function testFetchPsnPlayer()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchPsnPlayer('Chrakker');

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test whether characters are being fetched.
     *
     * @throws \Exception
     */
    public function testAutomaticCharacterFetching()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchXboxPlayer('aFreshMelon');

        $this->assertInstanceOf('Destiny\Game\CharacterCollection', $player->characters);
    }

    /**
     * Test the example in the readme.
     */
    public function testExampleInReadme()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchXboxPlayer('aFreshMelon');

        $firstCharacter = $player->characters->first();

        $this->assertInstanceOf('Destiny\Game\Character', $player->characters->get(0));

        $this->assertInternalType('int', $firstCharacter->characterLevel);
    }

}
 