<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function checkEmailNewsletters(\Step\Acceptance\LoginSteps $I)
    {
        $I->amOnPage('/');
        $I->waitForElement('.first-child');
    }

}

