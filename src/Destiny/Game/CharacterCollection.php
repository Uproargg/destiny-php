<?php namespace Destiny\Game;

use Destiny\Support\Collection;
use Destiny\Support\Exceptions\CharacterNotFoundException;

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

        foreach($this->items as $key => $character)
        {
            if($character->classHash == $classHash)
            {
                $characters->push($this->items[$key]);
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

} 