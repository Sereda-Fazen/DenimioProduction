<?php
use Step\Acceptance;

/**
 * @group 7_compare
 */
class CompareCest
{

    /**
     * Checking Compage Page
     * @param \Page\Compare $blogPage
     * @param \Step\Acceptance\CompareSteps $I
     */


    function checkAddToCompareWallet(\Page\Compare $blogPage, \Step\Acceptance\CompareSteps $I)
    {
        $I->addToCartWithOptionItem();
    }

    function checkAddCompareAnyItem(\Page\Compare $blogPage, \Step\Acceptance\CompareSteps $I)
    {
        $I->addToCartForCompare();
    }
/*
    function checkRemoveItemFromComparePage(\Page\Compare $blogPage, \Step\Acceptance\CompareSteps $I)
    {
        $I->removeItemFromComparePage();
    }

    function checkRemoveItemFromCategoryPage(\Page\Compare $blogPage, \Step\Acceptance\CompareSteps $I)
    {
        $I->removeItemFromCategory();
    }
*/




















}
