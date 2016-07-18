<?php
use Step\Acceptance;

/**
 * @group email
 */

class EmailCest
{

    function checkEmailMessage(\Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->checkNewsletterMsg();
        $I->checkWishlist();
        $I->checkNewPassword();
        $I->removeMsgs();
    }
        




















}
