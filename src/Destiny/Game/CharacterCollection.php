<?php namespace Destiny\Game;

use Destiny\Support\Collection;

class CharacterCollection extends Collection {

    /**
     * Get characters by class hash.
     *
     * @param $classHash
     * @return \Destiny\Game\CharacterCollection|null
     */
    public function getByClassHash($classHash)
    {
        $characters = new CharacterCollection([]);

        foreach($this->all() as $key => $character)
        {
            if($character->classHash == $classHash)
            {
                $characters->push($this->get($key));
            }
        }

        return $characters->count() > 0 ? $characters : null ;
    }

    /**
     * Get characters by class name.
     *
     * @param $className
     * @return \Destiny\Game\CharacterCollection|null
     */
    public function getByClassName($className)
    {
        $translator = new HashTranslator;

        return $this->getByClassHash($translator->reverse($className));
    }

    /**
     * Get warlocks in the collection.
     *
     * @return \Destiny\Game\CharacterCollection|null
     */
    public function getWarlocks()
    {
        return $this->getByClassHash(2271682572);
    }

    /**
     * Get titans in the collection.
     *
     * @return \Destiny\Game\CharacterCollection|null
     */
    public function getTitans()
    {
        return $this->getByClassHash(3655393761);
    }

    /**
     * Get hunters in the collection.
     *
     * @return \Destiny\Game\CharacterCollection|null
     */
    public function getHunters()
    {
        return $this->getByClassHash(671679327);
    }

    /**
     * Get the first characters by class hash.
     *
     * @param $classHash
     * @return \Destiny\Game\Character|null
     */
    public function firstByClassHash($classHash)
    {
        foreach($this->all() as $key => $character)
        {
            if($character->classHash == $classHash)
            {
                return $this->get($key);
            }
        }

        return null;
    }

    /**
     * Get characters by class name.
     *
     * @param $className
     * @return \Destiny\Game\Character|null
     */
    public function firstByClassName($className)
    {
        $translator = new HashTranslator;

        return $this->firstByClassHash($translator->reverse($className));
    }

    /**
     * Get warlocks in the collection.
     *
     * @return \Destiny\Game\Character|null
     */
    public function firstWarlock()
    {
        return $this->firstByClassHash(2271682572);
    }

    /**
     * Get titans in the collection.
     *
     * @return \Destiny\Game\Character|null
     */
    public function firstTitan()
    {
        return $this->firstByClassHash(3655393761);
    }

    /**
     * Get hunters in the collection.
     *
     * @return \Destiny\Game\Character|null
     */
    public function firstHunter()
    {
        return $this->firstByClassHash(671679327);
    }

} 