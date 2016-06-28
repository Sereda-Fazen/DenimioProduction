<?php
namespace Step\Acceptance;

class MyShoppingCartSteps extends \AcceptanceTester
{

    public function checkAccessories()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->fillField('#search', 'wallet');
        $I->click('//i[@class="fa fa-search"]');
        $I->waitForText('SEARCH RESULTS FOR \'WALLET\'');



    }

    public function checkFunctionalInRandomOrder()
    {
        $I = $this;
        $I->checkAccessories();

        $I->scrollDown(200);

        for ($s = 1; $s <= 2; $s++) {
            $I->moveMouseOver('//div[@class="category-products"]/ul[1]/li[' .$s.']//div/div');
            $I->wait(2);
            $I->waitForElement('//div[@class="category-products"]/ul[1]/li[' .$s . ']//div/div/div/div/button');
            $I->click('//div[@class="category-products"]/ul[1]/li[' .$s . ']//div/div/div/div/button');
            $I->waitForAjax(40);
            $I->waitForElement('//div[@class="wrapper_box"]',30);
            $I->waitForElementVisible('//a[@id="continue_shopping"]');
            $I->click('//a[@id="continue_shopping"]');
        }
            $I->scrollUp(200);
            $I->see('2 items', '//div[@class="top-cart-title"]');
            $I->moveMouseOver('//div[@class="top-cart-title"]');
            $I->waitForElement('//div[@class="top-cart-content"]');
            $I->wait(2);
            $I->click('a > span > span:first-child');
            $I->waitForText('SHOPPING CART');
            $I->see('SHOPPING CART', 'h1');
        /*
            $I->click('//td[@class="a-center"]/a');
            $I->see('UPDATE CART', '//button[@class="button btn-cart"]/span');
            $I->fillField('//div[@class="add-to-cart"]/input', '2');
            $I->click('//button[@class="button btn-cart"]/span');
            $I->scrollUp(300);
            $I->see('2 items', 'a > span > span:first-child');

            $I->click('a > span > span:first-child');
        */
            $I->waitForElement('input.input-text.qty');
            $I->fillField('input.input-text.qty', '2');
            $I->click('//button[@name="update_cart_action"]');
            $I->see('3 items', 'a > span > span:first-child');

        $I->see('SHOPPING CART', 'h1');
        $I->seeElement('//tr[@class="last even"]');
        $I->click('//tr[@class="last even"]/td[7]/a');
        $I->acceptPopup();
        $I->waitForAjax(40);
        $I->waitForElementNotVisible('//tr[@class="last even"]',30);
        $I->dontSeeElement('//tr[@class="last even"]');
        $I->click('#empty_cart_button > span');
        $I->see('SHOPPING CART IS EMPTY', 'h1');

    }

    public function checkCouponAndGiftCard()
    {
        $I = $this;

        $I->checkAccessories();

        $I->moveMouseOver('//div[@class="category-products"]/ul[2]/li[2]');
        $I->wait(2);

        $I->moveMouseOver('//div[@class="category-products"]/ul[2]/li[2]//div/div/div/div/button');
        $I->click('//div[@class="category-products"]/ul[2]/li[2]//div/div/div/div/button');

        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');

        $I->scrollDown(600);
        $I->waitForElementVisible('//div[@class="buttons-set"]/button/span');
        $I->click('//div[@class="buttons-set"]/button/span');
        $I->see('This is a required field.', '#advice-required-entry-coupon_code');
        $I->fillField('#coupon_code', 'test');
        $I->click('//div[@class="buttons-set"]/button/span');
        $I->waitForElement('li.error-msg');
        $I->see('Coupon code "test" is not valid.', 'li.error-msg');

        $I->click('#giftvoucher');
        $I->waitForElementVisible('#giftvoucher_code');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Please enter your code','#giftcard_notice');

        $I->fillField('#giftvoucher_code','test');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Gift card "test" is invalid.','li.error-msg');

        $I->fillField('#giftvoucher_code','GIFT-ADFA-12NF0O');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Gift code "GIFT-XXXX-XXXXXX" has been applied successfully.' ,'li.success-msg');

        $I->waitForElementVisible('li.giftvoucher-discount-code > ul > li > a > img');
        $I->click('li.giftvoucher-discount-code > ul > li > a > img');
        $I->see('Gift Card "GIFT-XXXX-XXXXXX" has been removed successfully!' ,'li.success-msg');


        $I->click('#giftvoucher');
        $I->see('Your Gift Card information has been removed successfully.' ,'li.success-msg');

    }

    public function checkEstimateShippingAndTax(){

        $I = $this;

        $I->checkAccessories();

        $I->moveMouseOver('//div[@class="category-products"]/ul[2]/li[2]//div/div');
        $I->wait(2);
        $I->click('//div[@class="category-products"]/ul[2]/li[2]//div/div/div/div/button');

        $I->waitForElement('//div[@class="wrapper_box"]',30);
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');

        $I->scrollDown(300);
        $I->waitForElement('//ul[@class="form-list"]/li/div/select');
        $I->click('//ul[@class="form-list"]/li/div/select');
        $I->waitForElementVisible('//ul[@class="form-list"]//div/select/option');

        $I->click('//ul[@class="form-list"]//div/select/option[10]');
        $I->wait(2);

        $I->fillField('#region','test');
        $I->fillField('#postcode','test');
        $I->click('//*[@id="shipping-zip-form"]/div/button');
        $I->scrollDown(300);
        $I->waitForElementVisible('dl.sp-methods > dd > ul > li');
        $I->seeElement('[name="do"] > span');


    }

































}