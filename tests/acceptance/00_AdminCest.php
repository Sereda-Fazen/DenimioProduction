<?php
use \Step\Acceptance;

/**
 * @group admin
 */
class AdminCest
{

    function includeSelectionGiftCard (\Step\Acceptance\AdminSteps $I, \Page\AdminPanel $adminPanel)
    {
        $I->loginAdmin();
        $adminPanel->includeGiftCard();
    }



    function createAddToGiftCards (\Step\Acceptance\AdminSteps $I, \Page\AdminPanel $adminPanel) {
        $I->loginAdmin();
        $adminPanel->createAddToGiftCard('GIFT-ADFA-12NF22','100000','test1' );
        $I->checkExistGiftCard();
        $adminPanel->createAddToGiftCard('GIFT-ADFA-12NF0O','100000','test2' );
        $I->checkExistGiftCard();

    }

    function createPointsForUser (\Step\Acceptance\AdminSteps $I,\Page\AdminPanel $adminPanel)
    {
       $I->loginAdmin();
       $adminPanel->createPoints('alex sereda', '100');
    
    }
    
}

