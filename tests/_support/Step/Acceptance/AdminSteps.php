<?php
namespace Step\Acceptance;
use Exception;
class AdminSteps extends \AcceptanceTester
{


    public function loginAdmin(){
        $I= $this;
        $I->amOnPage('/admin/');
        $I->fillField('#username', 'admin');
        $I->fillField('#login', 'admin');
        $I->click('input.form-button');
        $I->see('Log Out','a.link-logout');
    }


    public function checkExistUserAdmin()
    {
        $I = $this;
        $grabMsg = $I->grabTextFrom('//*[@id="messages"]');
        if (preg_match('/The user has been saved./i', $grabMsg) == 1) {
            $I->see('The user has been saved.', '//*[@id="messages"]');
        } else {
            $I->see('A user with the same user name or email aleady exists.', '//*[@id="messages"]');
        }
    }

    public function checkExistGiftCard()
    {
        $I = $this;
        $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
        if (preg_match('/Gift Code was successfully saved/i', $grabMsg) == 1) {
            $I->see('Gift Code was successfully saved', '//ul[@class="messages"]');
        } else {
            $I->see('SQLSTATE[23000]: Integrity constraint violation', '//ul[@class="messages"]');
        }
    }


}

