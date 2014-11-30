<?php namespace Destiny\Game;

use Destiny\Support\Exceptions\NoCharactersFoundException;
use Destiny\Support\Http;
use Destiny\Support\Exceptions\CharacterNotFoundException;

class Player extends Http {

    /**
     * The players icon path.
     *
     * @var string
     */
    public $iconPath;

    /**
     * The players membership type.
     * 1 => Xbox
     * 2 => PSN
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
            $characters[] = new Character(
                $character['characterBase']['characterId'],
                $character['characterBase']['dateLastPlayed'],
                $character['characterBase']['minutesPlayedThisSession'],
                $character['characterBase']['minutesPlayedTotal'],
                $character['characterBase']['powerLevel'],
                $character['characterBase']['raceHash'],
                $character['characterBase']['genderHash'],
                $character['characterBase']['classHash'],
                $character['characterBase']['currentActivityHash'],
                $character['characterBase']['lastCompletedStoryHash'],
                $character['characterBase']['stats']['STAT_DEFENSE'],
                $character['characterBase']['stats']['STAT_INTELLECT'],
                $character['characterBase']['stats']['STAT_DISCIPLINE'],
                $character['characterBase']['stats']['STAT_STRENGTH'],
                $character['characterBase']['stats']['STAT_LIGHT'],
                $character['characterBase']['stats']['STAT_ARMOR'],
                $character['characterBase']['stats']['STAT_AGILITY'],
                $character['characterBase']['stats']['STAT_RECOVERY'],
                $character['characterBase']['stats']['STAT_OPTICS'],
                $character['characterBase']['customization']['personality'],
                $character['characterBase']['customization']['face'],
                $character['characterBase']['customization']['skinColor'],
                $character['characterBase']['customization']['lipColor'],
                $character['characterBase']['customization']['eyeColor'],
                $character['characterBase']['customization']['hairColor'],
                $character['characterBase']['customization']['featureColor'],
                $character['characterBase']['customization']['decalColor'],
                $character['characterBase']['customization']['wearHelmet'],
                $character['characterBase']['customization']['hairIndex'],
                $character['characterBase']['customization']['featureIndex'],
                $character['characterBase']['customization']['decalIndex'],
                $character['characterBase']['grimoireScore'],
                $character['characterBase']['peerView']['equipment'],
                $character['characterBase']['genderType'],
                $character['characterBase']['classType'],
                $character['characterBase']['buildStatGroupHash'],
                $character['levelProgression']['dailyProgress'],
                $character['levelProgression']['weeklyProgress'],
                $character['levelProgression']['currentProgress'],
                $character['levelProgression']['level'],
                $character['levelProgression']['step'],
                $character['levelProgression']['progressToNextLevel'],
                $character['levelProgression']['nextLevelAt'],
                $character['levelProgression']['progressionHash'],
                $character['emblemPath'],
                $character['backgroundPath'],
                $character['emblemHash'],
                $character['characterLevel'],
                $character['baseCharacterLevel'],
                $character['isPrestigeLevel'],
                $character['percentToNextLevel']
            );
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

            return $type;
        }

        return $type;
    }

}