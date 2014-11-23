<?php 

class FetchUserTest extends PHPUnit_Framework_TestCase {

    /**
     * Test fetching an Xbox user.
     *
     * @throws \Exception
     */
    public function testFetchXboxUser()
    {
        $destiny = new Destiny\Client();

        $user = $destiny->fetchUser('aFreshMelon', 1);

        $this->assertInstanceOf('Destiny\User', $user);
    }

    /**
     * Test fetching a PSN user.
     *
     * @throws \Exception
     */
    public function testFetchPsnUser()
    {
        $destiny = new Destiny\Client();

        $user = $destiny->fetchUser('Chrakker', 2);

        $this->assertInstanceOf('Destiny\User', $user);
    }

}
 