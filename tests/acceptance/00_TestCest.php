<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function checkEmailNewsletters(\Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->checkNewsletterMsg();
    }

}

