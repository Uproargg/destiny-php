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
    public function testGetWarlock()
    {
        $this->assertInstanceOf('Destiny\Game\Character', $this->player->characters->getWarlock());
    }

    /**
     * Test whether getting a titan from the characters works.
     */
    public function testGetTitan()
    {
        $this->assertInstanceOf('Destiny\Game\Character', $this->player->characters->getTitan());


    }

    /**
     * Test whether getting a hunter from the characters works.
     */
    public function testGetHunter()
    {
        $this->assertInstanceOf('Destiny\Game\Character', $this->player->characters->getHunter());
    }

}
 