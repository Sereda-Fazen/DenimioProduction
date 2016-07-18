<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function invalidURL(Step\Acceptance\LoginSteps $I, \Page\HomePage $homePage)
    {
        $homePage->home(); 
        $homePage->invalidURL();
    }

}

