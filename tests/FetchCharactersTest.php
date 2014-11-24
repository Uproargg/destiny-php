<?php 

class FetchCharactersTest extends PHPUnit_Framework_TestCase {

    /**
     * Test fetching a players characters.
     */
    public function testFetchCharacters()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchXboxPlayer('aFreshMelon');

        $characters = $player->fetchCharacters();

        $this->assertInstanceOf('Destiny\Support\Collections\CharacterCollection', $characters);
    }

}
 