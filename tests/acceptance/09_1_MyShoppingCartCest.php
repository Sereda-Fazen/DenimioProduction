<?php
use Step\Acceptance;

/**
 * @group 8_shopping_cart
 */

class MyShoppingCartCest
{

    /**
     * Check Product Item For Example (tops)
     * @param  \Step\Acceptance\MyShoppingCartSteps $I
     */

    function checkTwoItemsInShoppingCart(\Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkFunctionalInRandomOrder();

    }

    function checkCouponAndGiftCard(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkCouponAndGiftCard();
    }

    function checkEstimateShippingAndTax(\Page\MyShoppingCart $shoppingPage, \Step\Acceptance\MyShoppingCartSteps $I)
    {
        $I->checkEstimateShippingAndTax();
    }

























}
