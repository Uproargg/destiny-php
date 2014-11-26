<?php namespace Destiny\Game;

use GuzzleHttp\Client as Http;
use Destiny\Support\Collections\CharacterCollection;

class Player {

    /**
     * Class Guzzle instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

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
        $this->http = new Http;
        $this->iconPath = $iconPath;
        $this->membershipType = $membershipType;
        $this->membershipId = $membershipId;
        $this->displayName = $displayName;
        $this->characters = $this->fetchCharacters();
    }

    /**
     * Fetch a users Destiny characters.
     *
     * @return \Destiny\Support\Collections\CharacterCollection
     */
    protected function fetchCharacters()
    {
        $type = 'TigerXbox';

        if($this->membershipType == 2)
        {
            $type = 'TigerPSN';
        }

        $response = $this->http->get('http://www.bungie.net/Platform/Destiny/' . $type . '/Account/' . $this->membershipId);

        $json = $response->json();

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

}