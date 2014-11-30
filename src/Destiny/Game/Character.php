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
     * The characters personality.
     *
     * @var int
     */
    public $personality;

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
     * @param $characterId
     * @param $dateLastPlayed
     * @param $minutesPlayedThisSession
     * @param $minutesPlayedTotal
     * @param $powerLevel
     * @param $raceHash
     * @param $genderHash
     * @param $classHash
     * @param $currentActivityHash
     * @param $lastCompletedStoryHash
     * @param $defense
     * @param $intellect
     * @param $discipline
     * @param $strength
     * @param $light
     * @param $armor
     * @param $agility
     * @param $recovery
     * @param $optics
     * @param $personality
     * @param $face
     * @param $skinColor
     * @param $lipColor
     * @param $eyeColor
     * @param $hairColor
     * @param $featureColor
     * @param $decalColor
     * @param $wearHelmet
     * @param $hairIndex
     * @param $featureIndex
     * @param $decalIndex
     * @param $grimoireScore
     * @param $equipment
     * @param $genderType
     * @param $classType
     * @param $buildStatGroupHash
     * @param $dailyProgress
     * @param $weeklyProgress
     * @param $currentProgress
     * @param $level
     * @param $step
     * @param $progressToNextLevel
     * @param $nextLevelAt
     * @param $progressionHash
     * @param $emblemPath
     * @param $backgroundPath
     * @param $emblemHash
     * @param $characterLevel
     * @param $baseCharacterLevel
     * @param $isPrestigeLevel
     * @param $percentToNextLevel
     */
    public function __construct($characterId, $dateLastPlayed, $minutesPlayedThisSession, $minutesPlayedTotal, $powerLevel, $raceHash, $genderHash, $classHash, $currentActivityHash, $lastCompletedStoryHash, $defense, $intellect, $discipline, $strength, $light, $armor, $agility, $recovery, $optics, $personality, $face, $skinColor, $lipColor, $eyeColor, $hairColor, $featureColor, $decalColor, $wearHelmet, $hairIndex, $featureIndex, $decalIndex, $grimoireScore, $equipment, $genderType, $classType, $buildStatGroupHash, $dailyProgress, $weeklyProgress, $currentProgress, $level, $step, $progressToNextLevel, $nextLevelAt, $progressionHash, $emblemPath, $backgroundPath, $emblemHash, $characterLevel, $baseCharacterLevel, $isPrestigeLevel, $percentToNextLevel)
    {
        $this->characterId = $characterId;
        $this->dateLastPlayed = $dateLastPlayed;
        $this->minutesPlayedThisSession = $minutesPlayedThisSession;
        $this->minutesPlayedTotal = $minutesPlayedTotal;
        $this->powerLevel = $powerLevel;
        $this->raceHash = $raceHash;
        $this->genderHash = $genderHash;
        $this->classHash = $classHash;
        $this->currentActivityHash = $currentActivityHash;
        $this->lastCompletedStoryHash = $lastCompletedStoryHash;
        $this->defense = $defense;
        $this->intellect = $intellect;
        $this->discipline = $discipline;
        $this->strength = $strength;
        $this->light = $light;
        $this->armor = $armor;
        $this->agility = $agility;
        $this->recovery = $recovery;
        $this->optics = $optics;
        $this->personality = $personality;
        $this->face = $face;
        $this->skinColor = $skinColor;
        $this->lipColor = $lipColor;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->featureColor = $featureColor;
        $this->decalColor = $decalColor;
        $this->wearHelmet = $wearHelmet;
        $this->hairIndex = $hairIndex;
        $this->featureIndex = $featureIndex;
        $this->decalIndex = $decalIndex;
        $this->grimoireScore = $grimoireScore;
        $this->equipment = $equipment;
        $this->genderType = $genderType;
        $this->classType = $classType;
        $this->buildStatGroupHash = $buildStatGroupHash;
        $this->dailyProgress = $dailyProgress;
        $this->weeklyProgress = $weeklyProgress;
        $this->currentProgress = $currentProgress;
        $this->level = $level;
        $this->step = $step;
        $this->progressToNextLevel = $progressToNextLevel;
        $this->nextLevelAt = $nextLevelAt;
        $this->progressionHash = $progressionHash;
        $this->emblemPath = $emblemPath;
        $this->backgroundPath = $backgroundPath;
        $this->emblemHash = $emblemHash;
        $this->characterLevel = $characterLevel;
        $this->baseCharacterLevel = $baseCharacterLevel;
        $this->isPrestigeLevel = $isPrestigeLevel;
        $this->percentToNextLevel = $percentToNextLevel;
    }

}