<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function ECGikenPriceModule(\Page\Extensions $extensionsPage, \Step\Acceptance\ExtensionsSteps $I)
    {
        $extensionsPage->priceModule();
        $I->getCurrency();
    }

}

