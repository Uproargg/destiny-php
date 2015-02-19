<?php namespace Destiny\Support\Collections;

use Destiny\Support\Translators\HashTranslator;

class CharacterCollection extends Collection {

    /**
     * An instance of the HashTranslator.
     *
     * @var \Destiny\Support\Translators\HashTranslator
     */
    protected $translator;

    /**
     * Constructor
     *
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->translator = new HashTranslator;
    }

    /**
     * Get characters by class hash.
     *
     * @param $classHash
     * @return array|null
     */
    public function getByClassHash($classHash)
    {
        $characters = [];

        foreach($this->all() as $key => $character)
        {
            if($character->classHash == $classHash)
            {
                $characters[] = $this->get($key);
            }
        }

        return count($characters) > 0 ? $characters : null ;
    }

    /**
     * Get characters by class name.
     *
     * @param $className
     * @return array|null
     */
    public function getByClassName($className)
    {
        return $this->getByClassHash($this->translator->reverse($className));
    }

    /**
     * Get warlocks in the collection.
     *
     * @return array|null
     */
    public function getWarlocks()
    {
        return $this->getByClassHash(2271682572);
    }

    /**
     * Get titans in the collection.
     *
     * @return array|null
     */
    public function getTitans()
    {
        return $this->getByClassHash(3655393761);
    }

    /**
     * Get hunters in the collection.
     *
     * @return array|null
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
        return $this->firstByClassHash($this->translator->reverse($className));
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