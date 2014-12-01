<?php namespace Destiny;

// TODO: Make all tests work offline (Guzzle mocking, Response forging)

class TestCase extends \PHPUnit_Framework_TestCase {

    /**
     * A client instance to use in tests.
     *
     * @var \Destiny\Client
     */
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
        $this->destiny = new Client;

        $this->player = $this->destiny->fetchPlayer('aFreshMelon', 1);
    }

}
 