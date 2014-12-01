<?php namespace Destiny\Game;

use Destiny\TestCase;

class HashTranslatorTest extends TestCase {

    /**
     * The translator instance to test on.
     *
     * @var \Destiny\Game\HashTranslator
     */
    public $translator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translator = new HashTranslator;
    }

    /**
     * Test translating a hash.
     */
    public function testHashTranslation()
    {
        $translation = $this->translator->translate(2271682572);

        $this->assertEquals('Warlock', $translation);
    }

    /**
     * Test reversing a translation.
     */
    public function testReverseTranslation()
    {
        $translation = $this->translator->reverse('Crucible');

        $this->assertEquals(1357277120, $translation);
    }

}
 