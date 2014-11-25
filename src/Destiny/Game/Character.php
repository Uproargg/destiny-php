<?php namespace Destiny\Game;

class Character {

    /**
     * @var string
     */
    public $membershipId;

    /**
     * @var int
     */
    public $membershipType;

    /**
     * @var string
     */
    public $characterId;

    /**
     * @var string
     */
    public $dateLastPlayed;

    /**
     * @var string
     */
    public $minutesPlayedThisSession;

    /**
     * @var string
     */
    public $minutesPlayedTotal;

    /**
     * @var int
     */
    public $powerLevel;

    /**
     * @var int
     */
    public $raceHash;

    /**
     * @var int
     */
    public $genderHash;

    /**
     * @var int
     */
    public $classHash;

    /**
     * @var int
     */
    public $currentActivityHash;

    /**
     * @var int
     */
    public $lastCompletedStoryHash;

    /**
     * @var array
     */
    public $defense;

    /**
     * @var array
     */
    public $intellect;

    /**
     * @var array
     */
    public $discipline;

    /**
     * @var array
     */
    public $strength;

    /**
     * @var array
     */
    public $light;

    /**
     * @var array
     */
    public $armor;

    /**
     * @var array
     */
    public $agility;

    /**
     * @var array
     */
    public $recovery;

    /**
     * @var array
     */
    public $optics;

    /**
     * @var int
     */
    public $face;

    /**
     * @var int
     */
    public $skinColor;

    /**
     * @var int
     */
    public $lipColor;

    /**
     * @var int
     */
    public $eyeColor;

    /**
     * @var int
     */
    public $hairColor;

    /**
     * @var int
     */
    public $featureColor;

    /**
     * @var int
     */
    public $decalColor;

    /**
     * @var bool
     */
    public $wearHelmet;

    /**
     * @var int
     */
    public $hairIndex;

    /**
     * @var int
     */
    public $featureIndex;

    /**
     * @var int
     */
    public $decalIndex;

    /**
     * @var int
     */
    public $grimoireScore;

    /**
     * @var array
     */
    public $equipment;

    /**
     * @var int
     */
    public $genderType;

    /**
     * @var int
     */
    public $classType;

    /**
     * @var int
     */
    public $buildStatGroupHash;

    /**
     * @var int
     */
    public $dailyProgress;

    /**
     * @var int
     */
    public $weeklyProgress;

    /**
     * @var int
     */
    public $currentProgress;

    /**
     * @var int
     */
    public $level;

    /**
     * @var int
     */
    public $step;

    /**
     * @var int
     */
    public $progressToNextLevel;

    /**
     * @var int
     */
    public $nextLevelAt;

    /**
     * @var int
     */
    public $progressionHash;

    /**
     * @var string
     */
    public $emblemPath;

    /**
     * @var string
     */
    public $backgroundPath;

    /**
     * @var int
     */
    public $emblemHash;

    /**
     * @var int
     */
    public $characterLevel;

    /**
     * @var int
     */
    public $baseCharacterLevel;

    /**
     * @var bool
     */
    public $isPrestigeLevel;

    /**
     * @var double
     */
    public $percentToNextLevel;

    /**
     * Constructor
     *
     * @param $agility
     * @param $armor
     * @param $backgroundPath
     * @param $baseCharacterLevel
     * @param $buildStatGroupHash
     * @param $characterId
     * @param $characterLevel
     * @param $classHash
     * @param $classType
     * @param $currentActivityHash
     * @param $currentProgress
     * @param $dailyProgress
     * @param $dateLastPlayed
     * @param $decalColor
     * @param $decalIndex
     * @param $defense
     * @param $discipline
     * @param $emblemHash
     * @param $emblemPath
     * @param $equipment
     * @param $eyeColor
     * @param $face
     * @param $featureColor
     * @param $featureIndex
     * @param $genderHash
     * @param $genderType
     * @param $grimoireScore
     * @param $hairColor
     * @param $hairIndex
     * @param $intellect
     * @param $isPrestigeLevel
     * @param $lastCompletedStoryHash
     * @param $level
     * @param $light
     * @param $lipColor
     * @param $membershipId
     * @param $membershipType
     * @param $minutesPlayedThisSession
     * @param $minutesPlayedTotal
     * @param $nextLevelAt
     * @param $optics
     * @param $percentToNextLevel
     * @param $powerLevel
     * @param $progressToNextLevel
     * @param $progressionHash
     * @param $raceHash
     * @param $recovery
     * @param $skinColor
     * @param $step
     * @param $strength
     * @param $wearHelmet
     * @param $weeklyProgress
     */
    function __construct($agility, $armor, $backgroundPath, $baseCharacterLevel, $buildStatGroupHash, $characterId, $characterLevel, $classHash, $classType, $currentActivityHash, $currentProgress, $dailyProgress, $dateLastPlayed, $decalColor, $decalIndex, $defense, $discipline, $emblemHash, $emblemPath, $equipment, $eyeColor, $face, $featureColor, $featureIndex, $genderHash, $genderType, $grimoireScore, $hairColor, $hairIndex, $intellect, $isPrestigeLevel, $lastCompletedStoryHash, $level, $light, $lipColor, $membershipId, $membershipType, $minutesPlayedThisSession, $minutesPlayedTotal, $nextLevelAt, $optics, $percentToNextLevel, $powerLevel, $progressToNextLevel, $progressionHash, $raceHash, $recovery, $skinColor, $step, $strength, $wearHelmet, $weeklyProgress)
    {
        $this->agility = $agility;
        $this->armor = $armor;
        $this->backgroundPath = $backgroundPath;
        $this->baseCharacterLevel = $baseCharacterLevel;
        $this->buildStatGroupHash = $buildStatGroupHash;
        $this->characterId = $characterId;
        $this->characterLevel = $characterLevel;
        $this->classHash = $classHash;
        $this->classType = $classType;
        $this->currentActivityHash = $currentActivityHash;
        $this->currentProgress = $currentProgress;
        $this->dailyProgress = $dailyProgress;
        $this->dateLastPlayed = $dateLastPlayed;
        $this->decalColor = $decalColor;
        $this->decalIndex = $decalIndex;
        $this->defense = $defense;
        $this->discipline = $discipline;
        $this->emblemHash = $emblemHash;
        $this->emblemPath = $emblemPath;
        $this->equipment = $equipment;
        $this->eyeColor = $eyeColor;
        $this->face = $face;
        $this->featureColor = $featureColor;
        $this->featureIndex = $featureIndex;
        $this->genderHash = $genderHash;
        $this->genderType = $genderType;
        $this->grimoireScore = $grimoireScore;
        $this->hairColor = $hairColor;
        $this->hairIndex = $hairIndex;
        $this->intellect = $intellect;
        $this->isPrestigeLevel = $isPrestigeLevel;
        $this->lastCompletedStoryHash = $lastCompletedStoryHash;
        $this->level = $level;
        $this->light = $light;
        $this->lipColor = $lipColor;
        $this->membershipId = $membershipId;
        $this->membershipType = $membershipType;
        $this->minutesPlayedThisSession = $minutesPlayedThisSession;
        $this->minutesPlayedTotal = $minutesPlayedTotal;
        $this->nextLevelAt = $nextLevelAt;
        $this->optics = $optics;
        $this->percentToNextLevel = $percentToNextLevel;
        $this->powerLevel = $powerLevel;
        $this->progressToNextLevel = $progressToNextLevel;
        $this->progressionHash = $progressionHash;
        $this->raceHash = $raceHash;
        $this->recovery = $recovery;
        $this->skinColor = $skinColor;
        $this->step = $step;
        $this->strength = $strength;
        $this->wearHelmet = $wearHelmet;
        $this->weeklyProgress = $weeklyProgress;
    }

}