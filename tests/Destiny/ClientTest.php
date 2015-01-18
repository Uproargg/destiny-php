<?php namespace Destiny;

class ClientTest extends TestCase {

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test fetching an Xbox player.
     *
     * @throws \Exception
     */
    public function testFetchXboxPlayer()
    {
        $player = $this->destiny->fetchXboxPlayer('aFreshMelon');

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test fetching a PSN player.
     *
     * @throws \Exception
     */
    public function testFetchPsnPlayer()
    {
        $player = $this->destiny->fetchPsnPlayer('Chrakker');

        $this->assertInstanceOf('Destiny\Game\Player', $player);
    }

    /**
     * Test whether characters are being fetched.
     *
     * @throws \Exception
     */
    public function testAutomaticCharacterFetching()
    {
        $this->assertInstanceOf('Destiny\Game\CharacterCollection', $this->player->characters);

        $this->assertInstanceOf('Destiny\Game\Character', $this->player->characters->first());
    }

    /**
     * Test the example in the readme.
     */
    public function testExampleInReadme()
    {
        $firstCharacter = $this->player->characters->first();

        $this->assertInstanceOf('Destiny\Game\Character', $this->player->characters->get(0));

        $this->assertInternalType('int', $firstCharacter->characterLevel);
    }

}
 