<?php 

class HashTranslatorTest extends PHPUnit_Framework_TestCase {

    /**
     * Test translating a hash.
     */
    public function testHashTranslation()
    {
        $translator = new Destiny\Game\HashTranslator;

        $translation = $translator->translate(2271682572);

        $this->assertEquals('Warlock', $translation);
    }

    /**
     * Test reversing a translation.
     */
    public function testReverseTranslation()
    {
        $translator = new Destiny\Game\HashTranslator;

        $translation = $translator->reverse('Crucible');

        $this->assertEquals(1357277120, $translation);
    }

}
 