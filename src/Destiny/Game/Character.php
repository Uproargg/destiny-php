<?php namespace Destiny\Game;

class Character {

    /**
     * The character's id.
     *
     * @var string
     */
    public $characterId;

    /**
     * The date when the character last played.
     *
     * @var string
     */
    public $dateLastPlayed;

    /**
     * How many minutes the character played in the last session.
     *
     * @var string
     */
    public $minutesPlayedThisSession;

    /**
     * How many minutes the character has played in total.
     *
     * @var string
     */
    public $minutesPlayedTotal;

    /**
     * The character's power level.
     *
     * @var int
     */
    public $powerLevel;

    /**
     * The character's race in a hashed version.
     *
     * @var int
     */
    public $raceHash;

    /**
     * The character's gender in a hashed version.
     *
     * @var int
     */
    public $genderHash;

    /**
     * The character's class in a hashed version.
     *
     * @var int
     */
    public $classHash;

    /**
     * The character's current activity in a hashed version.
     *
     * @var int
     */
    public $currentActivityHash;

    /**
     * The character's last completed story mission in a hashed version.
     *
     * @var int
     */
    public $lastCompletedStoryHash;

    /**
     * Defense values for the character.
     *
     * @var array
     */
    public $defense;

    /**
     * Intellect values for the character.
     *
     * @var array
     */
    public $intellect;

    /**
     * Discipline values for the character.
     *
     * @var array
     */
    public $discipline;

    /**
     * Strength values for the character.
     *
     * @var array
     */
    public $strength;

    /**
     * Light values for the character.
     *
     * @var array
     */
    public $light;

    /**
     * Armor values for the character.
     *
     * @var array
     */
    public $armor;

    /**
     * Agility values for the character.
     *
     * @var array
     */
    public $agility;

    /**
     * Recovery values for the character.
     *
     * @var array
     */
    public $recovery;

    /**
     * Optics values for the character.
     *
     * @var array
     */
    public $optics;

    /**
     * The selected face on the character.
     *
     * @var int
     */
    public $face;

    /**
     * The selected skin color on the character.
     *
     * @var int
     */
    public $skinColor;

    /**
     * The selected lip color on the character.
     *
     * @var int
     */
    public $lipColor;

    /**
     * The selected eye color on the character.
     *
     * @var int
     */
    public $eyeColor;

    /**
     * The selected hair color on the character.
     *
     * @var int
     */
    public $hairColor;

    /**
     * The selected feature color on the character.
     *
     * @var int
     */
    public $featureColor;

    /**
     * The selected decal color on the character.
     *
     * @var int
     */
    public $decalColor;

    /**
     * The flag whether to wear a helmet or not.
     *
     * @var bool
     */
    public $wearHelmet;

    /**
     * The hair index on the character.
     *
     * @var int
     */
    public $hairIndex;

    /**
     * The feature index on the character.
     *
     * @var int
     */
    public $featureIndex;

    /**
     * The decal index on the character.
     *
     * @var int
     */
    public $decalIndex;

    /**
     * The character's Grimoire score.
     *
     * @var int
     */
    public $grimoireScore;

    /**
     * The equipment this character holds.
     *
     * @var array
     */
    public $equipment;

    /**
     * This characters gender.
     *
     * @var int
     */
    public $genderType;

    /**
     * This characters class.
     *
     * @var int
     */
    public $classType;

    /**
     * This character's build stat group hash.
     *
     * @var int
     */
    public $buildStatGroupHash;

    /**
     * The daily progress the character has made.
     *
     * @var int
     */
    public $dailyProgress;

    /**
     * The weekly progress the character has made.
     *
     * @var int
     */
    public $weeklyProgress;

    /**
     * The progress this character has in the current week in total.
     *
     * @var int
     */
    public $currentProgress;

    /**
     * This characters level.
     *
     * @var int
     */
    public $level;

    /**
     * This character's step to the next level.
     *
     * @var int
     */
    public $step;

    /**
     * This character's progress towards the next level.
     *
     * @var int
     */
    public $progressToNextLevel;

    /**
     * The total EP needed to get to the next level.
     *
     * @var int
     */
    public $nextLevelAt;

    /**
     * This character's progression hash.
     *
     * @var int
     */
    public $progressionHash;

    /**
     * The path to the emblem this character is using. (relative to Bungie's website)
     *
     * @var string
     */
    public $emblemPath;

    /**
     * The path to the background this character is using. (relative to Bungie's website)
     *
     * @var string
     */
    public $backgroundPath;

    /**
     * The hash of the emblem this character uses.
     *
     * @var int
     */
    public $emblemHash;

    /**
     * The character's level.
     *
     * @var int
     */
    public $characterLevel;

    /**
     * The character's base level not including light level.
     *
     * @var int
     */
    public $baseCharacterLevel;

    /**
     * Whether the level of the character is above the level cap.
     *
     * @var bool
     */
    public $isPrestigeLevel;

    /**
     * How many percent the character needs to the next level.
     *
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