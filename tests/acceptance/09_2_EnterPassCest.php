<?php
use \Step\Acceptance;
/**
 * @group 1_password
 */
class EnterPassCest {

    function checkEmailNewPassword(\Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->checkNewPassword();
    }
    
}
