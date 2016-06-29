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

    function ECGikenPriceModule(\Page\Extensions $extensionsPage)
    {
        $extensionsPage->priceModule();
    }









}

