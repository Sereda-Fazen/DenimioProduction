<?php
use \Step\Functional;

/**
 * @group test
 */
class FunctionalCest
{
    function checkEmailNewsletters(\Step\Functional\Steps $I)
    {
        //$I->login();
        //$I->forgotPass();
        $I->yahoo();
    }

}

