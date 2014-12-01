<?php namespace Destiny\Game;

use Destiny\Support\Collection;
use Destiny\Support\Exceptions\CharacterNotFoundException;

class CharacterCollection extends Collection {

    /**
     * Get a characters from the collection by class hash.
     *
     * @param $classHash
     * @return mixed|null
     */
    public function getCharacterByClassHash($classHash)
    {
        foreach($this->all() as $key => $character)
        {
            if($character->classHash == $classHash)
            {
                return $this->get($key);
            }
        }

        throw new CharacterNotFoundException;
    }

    /**
     * Get a warlock from the collection.
     *
     * @return mixed|null
     */
    public function getWarlock()
    {
        return $this->getCharacterByClassHash(2271682572);
    }

    /**
     * Get a titan from the collection.
     *
     * @return mixed|null
     */
    public function getTitan()
    {
        return $this->getCharacterByClassHash(3655393761);
    }

    /**
     * Get a hunter from the collection.
     *
     * @return mixed|null
     */
    public function getHunter()
    {
        return $this->getCharacterByClassHash(671679327);
    }

} 