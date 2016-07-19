<?php
use Step\Acceptance;

/**
 * @group email
 */

class EmailCest
{

    function checkEmailNewsletters(\Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->checkNewsletterMsg();
    }
    function checkEmailWishlist(\Step\Acceptance\LoginSteps $I)
    {
        $I->checkWishlist();
    }
    
    function removeAllMessage(\Step\Acceptance\LoginSteps $I){
        $I->gMailAuth();
        $I->removeMsgs();
    }
        




















}
