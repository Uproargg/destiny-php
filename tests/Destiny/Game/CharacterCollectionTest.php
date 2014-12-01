<?php namespace Destiny\Game;

use Destiny\TestCase;

class CharacterCollectionTest extends TestCase {

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test whether getting a warlock from the characters works.
     */
    public function testGetWarlocks()
    {
        $this->assertInstanceOf('Destiny\Game\CharacterCollection', $this->player->characters->getWarlocks());
    }

    /**
     * Test whether getting a titan from the characters works.
     */
    public function testGetTitans()
    {
        $this->assertInstanceOf('Destiny\Game\CharacterCollection', $this->player->characters->getTitans());


    }

    /**
     * Test whether getting a hunter from the characters works.
     */
    public function testGetHunters()
    {
        $this->assertInstanceOf('Destiny\Game\CharacterCollection', $this->player->characters->getHunters());
    }

}
 