<?php namespace Destiny\Game;

use Destiny\Support\Traits\MakesApiConnections;
use Destiny\Support\Collections\CharacterCollection;
use Destiny\Support\Exceptions\NoCharactersFoundException;

class Player {

    use MakesApiConnections;

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
        $this->init();
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
        $json = $this->requestJson('/Platform/Destiny/' . $this->membershipType . '/Account/' . $this->membershipId);

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
     * Fetch a player's grimoire data.
     *
     * @return array
     */
    public function fetchGrimoireData()
    {
        $json = $this->requestJson('/Platform/Destiny/Vanguard/Grimoire/' . $this->membershipType . '/' . $this->membershipId . '/?definitions=true');

        return $json;
    }

}