<?php namespace Destiny\Support\Contracts;

interface Translates
{

    /**
     * Translate the given input.
     *
     * @param $input
     * @return mixed
     */
    public function translate($input);

    /**
     * Reverse the translation of a given translation.
     *
     * @param $translation
     * @return mixed
     */
    public function reverse($translation);
}
