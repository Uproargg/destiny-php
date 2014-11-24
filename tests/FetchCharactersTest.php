<?php 

class FetchCharactersTest extends PHPUnit_Framework_TestCase {

    public function testFetchCharacters()
    {
        $destiny = new Destiny\Client;

        $player = $destiny->fetchXboxPlayer('aFreshMelon');

        $characters = $player->fetchCharacters();

        $this->assertInstanceOf('Destiny\Game\Collections\CharacterCollection', $characters);
    }

}
 