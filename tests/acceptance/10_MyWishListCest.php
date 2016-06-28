<?php
use Step\Acceptance;

/**
 * @group 6_myWishlist
 */
class MyWishListCest
{

    function MyWishListForUser(Step\Acceptance\MyAccountSteps $I) {
        $I->login();
        $I->additionItemInList();

    }
















}