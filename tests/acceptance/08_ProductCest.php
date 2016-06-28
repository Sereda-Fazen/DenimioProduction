<?php
use Step\Acceptance;

/**
 * @group 8_product
 */

class ProductCest
{


    /**
     * Check Picture And Prev View And Zoom
     * @param \Page\Product $productPage
     * @param Acceptance\ProductSteps $I
     */

    function checkPictureZoom(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I) {

        $I->checkPictureArrows();
    }
    function checkPictureLikeView(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I){

        $I->checkPictureAndZoom();
    }

    /**
     * Check Review
     * @param \Page\Product $productPage
     */

    function checkMainBlockRating(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkInRandomOrder();
        $productPage->checkMainBlockReview('name','test','test');
    }

    /**
     * Check Description, Shipping, Details, Returns
     * @param \Page\Product $productPage
     * @param \Step\Acceptance\ProductSteps
     */

    function checkMainLinks(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkLinksForItem();
    }

    /**
     * Check Select Size
     * @param \Page\Product $productPage
     * @param \Step\Acceptance\ProductSteps
     */

/*
    function checkSelectSizeForTops(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkSelectSizeForTops();
    }
*/
    function checkSelectSizeForBottoms(\Page\Product $productPage, \Step\Acceptance\ProductSteps $I)
    {
        $I->checkSelectSizeForBottoms();
    }























}
