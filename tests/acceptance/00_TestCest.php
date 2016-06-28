<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function enterNewPass (Step\Acceptance\ForgotPassSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();
        $I->newPass();
    }
}

