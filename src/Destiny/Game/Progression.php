<?php

namespace Destiny\Game;

use Destiny\Support\Traits\ResolvesKeysToProperties;

class Progression
{
    use ResolvesKeysToProperties;

    /**
     * The progression data.
     *
     * @var array
     */
    protected $progressionData;

    /**
     * The total amount of steps this progression has.
     *
     * @var int
     */
    public $totalSteps;

    /**
     * Constructor.
     *
     * @param array $progressionData
     */
    public function __construct(array $progressionData)
    {
        $this->progressionData = $progressionData;
        $this->totalSteps = count($this->steps);
    }

    /**
     * Retrieve keys with a magic getter.
     *
     * @param $name
     *
     * @return null
     */
    public function __get($name)
    {
        return $this->resolveKey($name, $this->progressionData);
    }
}
