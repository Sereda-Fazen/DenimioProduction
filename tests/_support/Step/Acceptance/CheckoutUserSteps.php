<?php
namespace Step\Acceptance;

use Exception;

class CheckoutUserSteps extends \AcceptanceTester
{


    public function getCloseSub()
    {
        $I = $this;

        try {
            $I->waitForElement('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start');
        } catch (Exception $e) {
        }
        $I->wait(2);
    }


    public function login()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('a.login_click');
        $I->fillField('#email', 'denimio_test@yahoo.com');
        $I->fillField('#pass', '123456');
        $I->click('Login');
        $I->see('From your My Account Dashboard', 'div.welcome-msg > p:nth-of-type(2)');
    }


    public function checkAddToCartItem()
    {
        $I = $this;
        $wallet = 'WALLET';
        $I->amOnPage('/');
        $I->fillField('#search', 'wallet');
        $I->click('i.fa.fa-search');
        $I->see('SEARCH RESULTS FOR', 'h1');
        $I->see($wallet);

        $I->moveMouseOver('//div[@class="category-products"]/ul/li[1]//div/div');
        $I->wait(2);
        $I->waitForElementVisible('//div[@class="category-products"]/ul/li[1]//div/div/div/div/button');
        $I->click('//div[@class="category-products"]/ul/li[1]//div/div/div/div/button');
        $I->waitForElementVisible('//a[@id="continue_shopping"]', 40);
        $I->waitForAjax(20);
        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');


        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
    }

    public function checkAddToCartCustomers()
    {
        $I = $this;
        $wallet = 'WALLET';
        $I->amOnPage('/');
        $I->fillField('#search', 'wallet');
        $I->click('i.fa.fa-search');
        $I->see('SEARCH RESULTS FOR', 'h1');
        $I->see($wallet);

        $I->moveMouseOver('//div[@class="category-products"]/ul/li[1]//div/div');
        $I->wait(2);
        $I->waitForElementVisible('//div[@class="category-products"]/ul/li[1]//div/div/div/div/button');
        $I->click('//div[@class="category-products"]/ul/li[1]//div/div/div/div/button');
        $I->waitForElementVisible('//a[@id="continue_shopping"]', 40);
        $I->waitForAjax(20);
        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');

        $I->scrollDown(300);
        $I->waitForElement('//div[@class="discount"]');

        $I->click('#giftvoucher');
        $I->waitForElementVisible('#giftvoucher_code');
        $I->fillField('#giftvoucher_code', 'GIFT-ADFA-12NF22');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Gift code "GIFT-XXXX-XXXXXX" has been applied successfully.', 'li.success-msg');

        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');


    }


    public function checkOnShoppingCart()
    {
        $I = $this;
        $I->checkAddToCartItem();

        $I->waitForElement('//*[@id="billing-address-select"]');
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 20);
        $I->waitForElement('//*[@id="rewardpoints_payment_method"]');
        $I->click('//*[@id="rewardpoints_payment_method"]');
        $I->waitForAjax(10);
        $I->waitForElementVisible('//*[@id="cart-rewards-form"]/dl');

    }

    public function checkPoints()
    {
        $I = $this;
        $I->click('//*[@id="rewardpoints-slider-zoom-in"]/img');
        $I->waitForAjax(10);
        $I->waitForText('1');

        $I->click('//*[@id="rewardpoints-slider-zoom-out"]/img');
        $I->waitForAjax(10);
        $I->waitForText('0');

        $I->dragAndDrop('//*[@id="rewardpoints-track"]', '//*[@id="rewardpoints-handle"]');
        $I->waitForAjax(10);

        $I->fillField('//*[@id="reward_sales_point"]', '100');
        //$I->waitForElementVisible('//*[@id="check-spend-point"]/strong');
        $I->click('//*[@id="cart-rewards-form"]/dl/dt/label');
        $I->waitForText('100 Points');

        $I->click('//*[@id="rewardpoints-slider-container"]/div[2]/div[2]/label');
        $I->waitForAjax(10);
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 20);

        $I->waitForElement('//*[@id="checkout-review-table"]/tfoot/tr[5]/td[2]');
        $I->waitForText('Points');

    }

    public function checkoutAuthWithCheckout()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->checkAddToCartItem();

    }

    public function inputPointsAndPayPal()
    {
        $I = $this;
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 60);
        $I->click('//*[@id="rewardpoints_payment_method"]');
        $I->wait(3);
        $I->waitForElement('//*[@id="reward_sales_point"]', 60);
        $I->fillField('//*[@id="reward_sales_point"]', '10');
        $I->click('//*[@id="cart-rewards-form"]/dl/dt/label');


        $I->scrollDown(200);
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 60);
        $I->waitForElement('//*[@id="checkout-review-table"]/tfoot/tr[4]/td[1]');
        $I->getVisibleText('Use point (10 Points)');
        $I->waitForText('You will spend:', 40);
        $I->see('10 Points', '//*[@id="checkout-review-table-wrapper"]//tr[5]/td[2]');

        $I->click('i.fa.fa-times-circle');
        $I->acceptPopup();
        $I->waitForText('SHOPPING CART IS EMPTY');
        $I->resetCookie('rCookie');

    }


    /**
     * Most Customers
     */

    function checkMostCustomers()
    {
        $I = $this;

        $I->checkAddToCartCustomers();


        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 20);
        $I->waitForElement('li > strong',30);

        $I->click('i.fa.fa-plus-circle');
        $I->scrollDown(300);
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]', 20);
        $I->waitForElement('ul.success-msg');
        $I->getVisibleText('No Payment Information Required');
        $I->scrollDown(300);

        $I->waitForElementVisible('#edit_shipping_document_confirmation');
        $I->selectOption('#edit_shipping_document_confirmation', 'Yes - Most customer\'s choice');
        $I->waitForElement('//*[@id="proforma-save"]');
        $I->click('//*[@id="proforma-save"]');
        $I->click('#onestepcheckout-button-place-order');
        $I->waitForText('Thank you for your purchase!', 200);

        $I->see('YOUR ORDER HAS BEEN RECEIVED.', 'h1');
        $I->seeElement('//*[@id="rewardpoints-referfriends-popup"]');
        $I->see('Share With Friends', '//*[@id="rewardpoints-referfriends-popup"]/div[1]/h2');

    }

    function checkOrderInMyAccount()
    {
        $I = $this;

        $I->click('div.col-main > p:nth-of-type(1) > a');
        $I->waitForElement('dl.order-info');
        $I->see('About This Order:', 'dl.order-info');
    }

    function checkMyAccountLastOrder()
    {
        $I = $this;
        $I->scrollDown(200);
        $I->waitForElement('//div[@class="order-items order-details"]');
        $I->scrollUp(200);
        $I->click('//*[@id="order-info-tabs"]/li[2]/a');
        $I->waitForElement('//p[@class="order-date"]');
        $I->scrollDown(200);
        $I->seeElement('//div[@class="order-items order-details"]');
    }

    function checkRemoveGiftCard()
    {
        $I = $this;
        $I->click('div.block-content > ul > li:nth-of-type(11) > a');
        $I->waitForElement('//*[@id="giftvoucher_grid"]/tbody');
        $I->click('//*[@id="giftvoucher_grid"]/tbody/tr/td[6]/span/a[4]');
        $I->acceptPopup();
        $I->see('Gift card was successfully removed', 'li.success-msg');
        $I->resetCookie('rCookie');
    }


    /*
     *  public function inputPointsAndPayPal(){
            $I = $this;
            $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',60);
            $I->click('//*[@id="rewardpoints_payment_method"]');
            $I->waitForAjax(20);
            $I->waitForElementVisible('//*[@id="reward_sales_point"]');
            $I->fillField('//*[@id="reward_sales_point"]','10');
            $I->click('//*[@id="cart-rewards-form"]/dl/dt/label');
            $I->waitForAjax(10);

            $I->scrollDown(200);
            $I->waitForElement('//*[@id="checkout-review-table"]/tfoot/tr[4]/td[1]');
            $I->getVisibleText('Use point (10 Points)');
    /*
            $I->moveMouseOver('//*[@id="cc-help"]');
            $I->waitForElement('//*[@id="ccHelp"]/div');
            $I->fillField('//*[@id="onestepcheckout_comment"]', 'test payment');
            $I->moveMouseOver('//*[@id="shipDocHelp"]/div');

    $I->scrollDown(200);
    $I->waitForText('You will spend:');
    $I->see('10 Points','//*[@id="checkout-review-table-wrapper"]//tr[5]/td[2]');
        /*
        $I->waitForElement('//select[@id="edit_shipping_document_confirmation"]');
        $I->click('//select[@id="edit_shipping_document_confirmation"]');

        $I->waitForElement('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        //$I->waitForElement('//div[@id="billingModule"]',40);
        $I->waitForElement('li.error-msg');
        $I->see('PayPal gateway has rejected request. Timeout processing request (#10001: Internal Error).','li.error-msg');
       // $I->see('Create a PayPal account','div.body.clearfix.zoom > div.subhead');



}
 */






}