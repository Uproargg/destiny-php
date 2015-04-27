<?php namespace Destiny\Support\Translators;

use Destiny\Support\Contracts\Translates;
use Destiny\Support\Exceptions\HashNotFoundException;

class HashTranslator implements Translates
{

    /**
     * The array of hashes and translations available to this translator.
     *
     * @var array
     */
    protected $hashes = [
        '3159615086' => 'Glimmer',
        '1415355184' => 'Crucible Marks',
        '1415355173' => 'Vanguard Marks',
        '898834093' => 'Exo',
        '3887404748' => 'Human',
        '2803282938' => 'Awoken',
        '3111576190' => 'Male',
        '2204441813' => 'Female',
        '671679327' => 'Hunter',
        '3655393761' => 'Titan',
        '2271682572' => 'Warlock',
        '3871980777' => 'New Monarchy',
        '529303302' => 'Cryptarch',
        '2161005788' => 'Iron Banner',
        '452808717' => 'Queen',
        '3233510749' => 'Vanguard',
        '1357277120' => 'Crucible',
        '2778795080' => 'Dead Orbit',
        '1424722124' => 'Future War Cult',
        '2033897742' => 'Weekly Vanguard Marks',
        '2033897755' => 'Weekly Crucible Marks',
    ];

    /**
     * Translate a given hash.
     *
     * @param $hash
     * @return mixed
     */
    public function translate($hash)
    {
        if (!array_key_exists($hash, $this->hashes)) {
            throw new HashNotFoundException;
        }

        return $this->hashes[$hash];
    }

    /**
     * Reverse the a translation back to a hash.
     *
     * @param $translation
     * @return mixed
     */
    public function reverse($translation)
    {
        $search = array_search($translation, $this->hashes);

        if (!$search) {
            throw new HashNotFoundException;
        }

        return $search;
    }

}
