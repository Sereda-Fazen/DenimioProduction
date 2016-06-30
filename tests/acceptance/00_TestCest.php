<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function MyWishList(Step\Acceptance\LoginSteps $I, \Page\MyAccount $MyAccountPage) {

        $I->login();
        $MyAccountPage->accountMyWishList();

    }

}

