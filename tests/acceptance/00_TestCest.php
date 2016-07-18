<?php
use \Step\Acceptance;

/**
 * @group test
 */
class TestCest
{
    function MyNewsletter(\Page\MyAccount $MyAccountPage,\Helper\Acceptance $I)
    {
        $I->login();
        $MyAccountPage->accountNewsletterSave();
        $MyAccountPage->accountNewsletterDelete();
    }

}

