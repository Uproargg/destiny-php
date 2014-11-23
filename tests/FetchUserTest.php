<?php 

class FetchUserTest extends PHPUnit_Framework_TestCase {

    /**
     * Test fetching an Xbox user.
     *
     * @throws \Exception
     */
    public function testFetchXboxPlayer()
    {
        $destiny = new Destiny\Client();

        $user = $destiny->fetchPlayer('aFreshMelon', 1);

        $this->assertInstanceOf('Destiny\Game\Player', $user);
    }

    /**
     * Test fetching a PSN user.
     *
     * @throws \Exception
     */
    public function testFetchPsnPlayer()
    {
        $destiny = new Destiny\Client();

        $user = $destiny->fetchPlayer('Chrakker', 2);

        $this->assertInstanceOf('Destiny\Game\Player', $user);
    }

}
 