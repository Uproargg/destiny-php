<?php namespace Destiny\Game;

use Destiny\Support\Http;
use Destiny\Support\Exceptions\NoCharactersFoundException;

class Player extends Http {

    /**
     * The players icon path.
     *
     * @var string
     */
    public $iconPath;

    /**
     * The players membership type.
     *
     * @var int
     */
    public $membershipType;

    /**
     * The players membership ID.
     *
     * @var int
     */
    public $membershipId;

    /**
     * The players display name.
     *
     * @var string
     */
    public $displayName;

    /**
     * The players characters.
     *
     * @var array
     */
    public $characters;

    /**
     * Constructor
     *
     * @param $iconPath
     * @param $membershipType
     * @param $membershipId
     * @param $displayName
     */
    public function __construct($iconPath, $membershipType, $membershipId, $displayName)
    {
        parent::__construct();
        $this->iconPath = $iconPath;
        $this->membershipType = $membershipType;
        $this->membershipId = $membershipId;
        $this->displayName = $displayName;
        $this->characters = $this->fetchCharacters();
    }

    /**
     * Fetch a users Destiny characters.
     *
     * @return \Destiny\Game\CharacterCollection
     */
    protected function fetchCharacters()
    {
        $json = $this->requestJson('http://www.bungie.net/Platform/Destiny/' . $this->makeTypeWord() . '/Account/' . $this->membershipId);

        if(count($json['Response']['data']['characters']) < 1)
        {
            throw new NoCharactersFoundException;
        }

        foreach($json['Response']['data']['characters'] as $character)
        {
            $characters[] = new Character($character);
        }

        return new CharacterCollection($characters);
    }

    /**
     * Make the type word from the player type.
     *
     * @return string
     */
    protected function makeTypeWord()
    {
        $type = 'TigerXbox';

        if ($this->membershipType == 2) {
            $type = 'TigerPSN';
        }

        return $type;
    }

}