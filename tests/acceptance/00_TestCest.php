<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function checkEmailNewPassword(\Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->checkNewPassword();
    }

}

