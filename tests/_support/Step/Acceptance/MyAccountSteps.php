<?php
namespace Step\Acceptance;

use Exception;

class MyAccountSteps extends \AcceptanceTester
{

    public function getCloseSub(){
        $I = $this;

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
    }


    public function login()
    {
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        $I->getCloseSub();
        $I->fillField('#email', 'denimio_test@yahoo.com');
        $I->fillField('#pass', '123456');
        $I->click('Login');
        $I->see('From your My Account Dashboard','div.welcome-msg > p:nth-of-type(2)');
    }
    public function test()
    {
        $I = $this;
        $I->amOnPage('/');
       $I->wait(10);
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


    public function additionItemInList(){
        $I = $this;
        $I->checkTops();
        //$blockJeans = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul[1]/li')));
       // $blockJeans2 = rand(1,count($I->grabMultiple('//div[@class="category-products"]/ul')));

        for ($w = 1; $w <= 2; $w++) {
            $I->moveMouseOver('//div[@class="category-products"]/ul[1]/li['.$w.']/div/div');
            $I->wait(2);
            $I->click('//div[@class="category-products"]/ul[1]/li['.$w.']//li[2]');
            $I->waitForAjax(40);
            $I->waitForElement('//a[@id="continue_shopping"]',30);
            $I->waitForElementVisible('//a[@id="continue_shopping"]');
            $I->click('//a[@id="continue_shopping"]');
        }

        $I->moveMouseOver('//*[@class="dropit-trigger"]');
        $I->click('//*[@class="dropit-trigger"]//li[2]');
        $I->seeElement('//div[@class="my-wishlist"]');


        $I->fillField('//*[@class="add-to-cart-alt"]/input', '2');
        $I->click('//*[@name="do"]/span');

        $I->click('//*[@class="button btn-add"]/span');
        $I->see('Please specify the product\'s option(s) for ','li.error-msg');

        $I->click('//*[@class="button btn-share"]/span');
        $I->waitForElement('div.fieldset');

        $I->fillField('#email_address', 'denimio_test@yahoo.com');
        $I->fillField('#message', 'test');
        $I->click('//*[@class="buttons-set form-buttons"]/button/span');
        $I->waitForElement('li.success-msg');
        $I->see('Your Wishlist has been shared.','li.success-msg');

        $I->clearItemFromList();





    }


    public function clearItemFromList ()
    {
        $I = $this;
        $count = count($I->grabMultiple('//*[@id="wishlist-table"]/tbody'));
        for ($w = $count; $w > 0; $w--) {
            $I->click('//*[@id="wishlist-table"]/tbody/tr['.$w.']/td[4]/a');
            $I->acceptPopup();
            $I->getVisibleText('You have no items in your wishlist.');
        }
    }


























































}