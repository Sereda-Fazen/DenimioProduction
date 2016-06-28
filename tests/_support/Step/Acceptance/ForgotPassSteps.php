<?php
namespace Step\Acceptance;

use Exception;

class ForgotPassSteps extends \AcceptanceTester
{

    public function gMailAuth()
    {
        $I = $this;
        $I->amOnUrl("https://mail.yahoo.com");

        $pass = count($I->grabMultiple('//*[@id="login-passwd"]'));
        $I->fillField('//*[@id="login-username"]', 'denimio_test@yahoo.com');

            $I->click('//*[@id="login-signin"]');
            //$I->seeElement('//div[@id="mbr-login-error"]');
            $I->waitForElementVisible('//*[@id="login-passwd"]');
            $I->fillField('//*[@id="login-passwd"]', 'fJ4qEn5Y');
            $I->click('//*[@id="login-signin"]');

            $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Password")]');
            $I->click('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Password")]');
            try {
                $I->wait(2);
                $I->click('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Password")]');
            } catch (Exception $e) {}
            


    }


    public function remoteWindow() {
        $I = $this;
        $I->waitForElement('td > p:nth-of-type(2) > a');
        $I->click('td > p:nth-of-type(2) > a');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
    }

    public function remoteWindow2(){
        $I = $this;

        $I->click('div.banner-left > a > img');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });




    }

    public function newPass() {
        $I = $this;

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start'); $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
        $I->see('Reset a Password','h1');
        $I->fillField('#password', '123456');
        $I->fillField('#confirmation', '123456');
        $I->click('Reset a Password');
        $I->see('Your password has been updated.', 'li.success-msg');
    }

}