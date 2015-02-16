<?php namespace Destiny;

class TestCase extends \PHPUnit_Framework_TestCase {

    /**
     * A client instance to use in tests.
     *
     * @var \Destiny\Destiny
     */

    // TODO: Make all tests work offline (Guzzle mocking, Response forging)
    public $destiny;

    /**
     * A player to test on.
     *
     * @var \Destiny\Game\Player
     */
    public $player;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->destiny = new Destiny;

        $this->player = $this->destiny->fetchPlayer('aFreshMelon', 1);
    }

}
 