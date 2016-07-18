<?php
namespace Step\Acceptance;

use Exception;

class LoginSteps extends \AcceptanceTester
{

    public function getCloseSub(){
        $I = $this;

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
    }


    public function checkExistUser()
    {
        $I = $this;
        $grabMsg = $I->grabTextFrom('//ul[@class="messages"]');
        if (preg_match('/Thank you for registering with Denimio./i', $grabMsg) == 1) {
            $I->see('Thank you for registering with Denimio.', '//ul[@class="messages"]');
        } else {
            $I->see('There is already an account with this email address. ', '//ul[@class="messages"]');
        }
    }

    public function login()
        {
            $I = $this;
            $I->amOnPage('/');
            $I->click('//a[@class="login_click"]');
            $I->waitForElement('#email');
            $I->fillField('#email', 'denimio_test@yahoo.com');
            $I->fillField('#pass', '123456');
            $I->click('Login');
            $I->see('From your My Account Dashboard','div.welcome-msg > p:nth-of-type(2)');
        }



        public function waitAlertWindow ()
        {
            $I = $this;
            $count = count($I->grabMultiple('//*[@class="col-2 addresses-additional"]/ol/li'));
            for ($d = $count; $d > 0; $d--) {
                $I->scrollDown(100);
                $I->click('ol > li:nth-of-type(' . $d . ') > p > a.link-remove');
                $I->acceptPopup();
                $I->waitForElement('li.success-msg');
            }
        }

        public function giftCardEmpty()
        {
            $I = $this;
            try {

                for ($c = 8; $c >= 0; $c--) {
                    $card = rand();
                    $I->fillField('#gift-voucher-code', $card);
                    $I->click('div.text-left > button:nth-of-type(1) > span > span');
                    $I->see('Gift card "' . $card . '" is invalid.You have ' . $c . ' time(s) remaining to re-enter Gift Card code.', 'li.error-msg');
                }
                $I->fillField('#gift-voucher-code', $card);
                $I->click('div.text-left > button:nth-of-type(1) > span > span');
                $I->getVisibleText('The maximum number of times to enter gift card code is 10!', '.error-msg');


            } catch (Exception $e) {
                {
                    $I->click('button.form-button.button.addredeem > span');

                    for ($c = 9; $c >= 0; $c--) {
                        $card = rand();
                        $I->fillField('#gift-voucher-code', $card);
                        $I->click('div.text-left > button:nth-of-type(1) > span > span');
                        $I->see('Gift card "' . $card . '" is invalid.You have ' . $c . ' time(s) remaining to re-enter Gift Card code.', 'li.error-msg');
                    }
                    $I->fillField('#gift-voucher-code', $card);
                    $I->click('div.text-left > button:nth-of-type(1) > span > span');
                    $I->getVisibleText('The maximum number of times to enter gift card code is 10!', '.error-msg');
                }
            }
        }


    public function checkNewsletterMsg(){

        $I = $this;
        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text()," Newsletter subscription success ")]');
        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text()," Newsletter unsubscription success ")]');
    }

    public function checkWishlist(){

        $I = $this;
        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"wishlist")]');
        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"wishlist")]');
    }





    public function checkNewPassword(){

        $I = $this;
        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Password")]',30);
        $I->click('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Password")]');

        $I->waitForElement('td > p:nth-of-type(2) > a');
        $I->click('td > p:nth-of-type(2) > a');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start'); $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
        $I->see('Reset a Password','h1');
        $I->fillField('#password', '123456');
        $I->fillField('#confirmation', '123456');
        $I->click('Reset a Password');
        $I->see('Your password has been updated.', 'li.success-msg');

    }


    public function removeMsgs(){
        $I = $this;
        $I->waitForElement('//*[@id="btn-ml-cbox"]//input');
        $I->click('//*[@id="btn-ml-cbox"]//input');
        $I->seeCheckboxIsChecked('//*[@id="btn-ml-cbox"]//input');

        $I->waitForElement('//*[@class="icon-text"][contains(text(),"Delete")]');
        $I->click('//*[@class="icon-text"][contains(text(),"Delete")]');
        try {
            $I->waitForText('Your Inbox folder is empty');
        } catch (Exception $e){}

        
        try {$I->waitForElement('//div[@id="modalOverlay"]//button');
            $I->click('//div[@id="modalOverlay"]//button');} catch (Exception $e){}
        $I->waitForText('Your Inbox folder is empty');


        $I->waitForElement('//*[@class="icon-text"][contains(text(),"Delete")]');

    }












}