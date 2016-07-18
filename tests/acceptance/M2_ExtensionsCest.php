<?php
use \Step\Acceptance;

/**
 * @group extensions
 */
class ExtensionsCest
{
    function amastyMostViewed(\Page\Extensions $extensionsPage)
    {
        $extensionsPage->amastyMostViewed('S');
    }

    function checkWalletZoom(\Page\Extensions $extensionsPage)
    {
        $extensionsPage->checkWallet();
    }

    function ECGikenPriceModule(\Page\Extensions $extensionsPage, \Step\Acceptance\ExtensionsSteps $I)
    {
        $extensionsPage->priceModule();
        $I->getCurrency();
    }

    function paymentAddPointsUser (Step\Acceptance\CheckoutUserSteps $I, \Page\Checkout $userPage)
    {
        $I->checkoutAuthWithCheckout();
        $userPage->getAuthorization('denimio_test@yahoo.com','123456');
        $userPage->getShippingAddress();
        $userPage->typeDataShipping();


    }









}

