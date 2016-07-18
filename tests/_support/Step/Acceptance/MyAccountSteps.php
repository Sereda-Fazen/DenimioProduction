<?php
namespace Step\Acceptance;

use Exception;

class MyAccountSteps extends \AcceptanceTester
{

    public function gMailAuthWishlist()
    {
        $I = $this;
        $I->amOnUrl("https://mail.yahoo.com");
        $I->fillField('//*[@id="login-username"]', 'denimio_test@yahoo.com');
        $I->click('//*[@id="login-signin"]');
        $I->waitForElementVisible('//*[@id="login-passwd"]');
        $I->fillField('//*[@id="login-passwd"]', 'fJ4qEn5Y');
        $I->click('//*[@id="login-signin"]');

        $I->waitForElement('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Take")]');
        $I->click('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Take")]');
        $I->waitForText('Take a look at my wishlist from Denimio.');
        $I->waitForElement('//*[@class="icon-delete"]');
        $I->waitForElementNotVisible('//div[contains(@class, "unread")]/div/div[contains(@title,"denimio.com")]/../div/span[contains(text(),"Take")]');
        
    }


    public function getCloseSub(){
        $I = $this;

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
    }


    public function login()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->waitForElement('//li[@class="dropit-trigger"]/a');
        $I->click('//li[@class="dropit-trigger"]/a');
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
            $this->scrollDown(1000);
            $I->click('ol > li:nth-of-type(' . $d . ') > p > a.link-remove');
            $I->acceptPopup();
        }
    }

    public function giftCardEmpty()
    {
        $I = $this;
        $I->click('button.form-button.button.addredeem > span');
        for ($c = 9; $c >= 0; $c--) {
            $card = rand();
            $I->fillField('#gift-voucher-code', $card);
            $I->click('div.text-left > button:nth-of-type(1) > span > span');
            $I->see('Gift card "' . $card . '" is invalid.You have ' . $c . ' time(s) remaining to re-enter Gift Card code.','li.error-msg');
        }
        $I->fillField('#gift-voucher-code', $card);
        $I->click('div.text-left > button:nth-of-type(1) > span > span');
    }


    /**
     * Check My Orders after Check Order
     */

    public function checkTops()
    {
        $I = $this;
        $I->click('//div[@class="pt_custommenu"]//span[text()="Tops"]');
        $I->seeElement('//div[@class="category-products"]');
    }


    public function additionItemInList()
    {
        $I = $this;
        $I->checkTops();
        //$blockJeans = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul[1]/li')));
        // $blockJeans2 = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul')));

        for ($w = 1; $w <= 2; $w++) {
            $I->moveMouseOver('//div[@class="category-products"]/ul[1]/li[' . $w . ']/div/div');
            $I->wait(2);
            $I->click('//div[@class="category-products"]/ul[1]/li[' . $w . ']//li[2]');
            $I->waitForAjax(40);

            $I->waitForElement('//a[@id="continue_shopping"]', 30);
            $I->reloadPage();

        }

        $I->moveMouseOver('//*[@class="dropit-trigger"]');
        $I->click('//*[@class="dropit-trigger"]//li[2]');
        $I->seeElement('//div[@class="my-wishlist"]');

        $I->waitForElement('//div[@class="my-wishlist"]//tbody/tr[2]//td/a[contains(@title,"Remove")]');
        $I->click('//div[@class="my-wishlist"]//tbody/tr[2]//td/a[contains(@title,"Remove")]');
        $I->acceptPopup();

        $I->fillField('//*[@class="add-to-cart-alt"]/input', '2');
        $I->click('//*[@name="do"]/span');

        $I->click('//*[@class="button btn-add"]/span');
        $I->see('Please specify the product\'s option(s) for ', 'li.error-msg');

        $I->click('//*[@class="button btn-share"]/span');
        $I->waitForElement('div.fieldset');

        $I->fillField('#email_address', 'denimio_test@yahoo.com');
        $I->fillField('#message', 'test');
        $I->click('//*[@class="buttons-set form-buttons"]/button/span');
        $I->waitForElement('li.success-msg');
        $I->see('Your Wishlist has been shared.', 'li.success-msg');
    }

    public function removeItemWishlist(){
        
        $I = $this;
        $count = count($I->grabMultiple('//*[@id="wishlist-table"]/tbody'));
        $I->amOnPage('/wishlist');
        $I->waitForElement('//*[@id="wishlist-table"]');
        for ($w = $count; $w > 0; $w--) {
            $I->click('//*[@id="wishlist-table"]/tbody/tr['.$w.']/td[4]/a');
            $I->acceptPopup();

        }
        $I->waitForText('You have no items in your wishlist.');
    }


























































}