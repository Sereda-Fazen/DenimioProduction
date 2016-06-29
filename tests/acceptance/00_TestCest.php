<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function checkSelectSizeForBottoms(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkSelectSizeForBottoms();
    }

}

