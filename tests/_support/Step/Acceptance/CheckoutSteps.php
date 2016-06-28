<?php
namespace Step\Acceptance;

use Exception;

class CheckoutSteps extends \AcceptanceTester
{

    public function checkMessageError(){
        $I = $this;
        $grabMsg = $I->grabTextFrom('//li[@class="error-msg"]');
        if (preg_match('/The user has been saved./i', $grabMsg) == 1) {
            $I->see('Network Error, E02004', '//li[@class="error-msg"]');
        } else {
            $I->see('Authorization process has an error', '//li[@class="error-msg"]');

        }
    }


    public function checkDataForGuest (){
        $I = $this;
        $billing = '#billing\3A ';
        $I->waitForElement($billing.'firstname',60);
        $I->fillField($billing.'firstname', 'alex');
        $I->fillField($billing.'lastname', 'sereda');
        $I->fillField($billing.'email', 'test_test@yahoo.com');

        $I->fillField('#billing-new-address-form > ul > li:nth-of-type(3) > div.one-field > input.required-entry.input-text', 'Test street 22V');
        $I->fillField($billing.'city', 'Kharkov');
        $I->waitForElementVisible('#valid_email_address_image > img',60);
        $I->fillField($billing.'postcode', '1rr354');
        $I->fillField($billing.'postcode', '61007');
        $I->click('//*[@id="billing:country_id"]/option[231]');
        $I->fillField($billing.'region', 'Kharkov');
        $I->fillField($billing.'telephone', '80934568798');

    }

    public function checkDataForGuestShippingAddress (){
        $I = $this;
        $shipping = '#shipping\3A ';
        $I->waitForElementVisible('#billing\3A firstname');
        $I->fillField($shipping.'firstname', 'alex');
        $I->fillField($shipping.'lastname', 'sereda');
        $I->fillField($shipping.'telephone', '80934568798');
        $I->fillField('//*[@id="shipping-new-address-form"]/ul/li[3]//input', 'Test street 22V');
        $I->click($shipping. 'country_id');
        $I->click('//*[@id="shipping:country_id"]/option[231]');
        $I->fillField($shipping.'region', 'Kharkov');
        $I->scrollUp(200);
    }

    public function checkOnShoppingCart()
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
        $I->waitForElementVisible('//a[@id="continue_shopping"]',40);
        $I->waitForAjax(20);
        $I->waitForElement('//div[@class="wrapper_box"]');
        $I->click('//a[@id="shopping_cart"]');
        $I->see('SHOPPING CART', 'h1');
    }

    public function checkProcessTypeData()

    {
        $I = $this;
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
        $I->checkDataForGuest();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',40);
        $I->click('#p_method_veritrans_cc');

        // Cards
        $I->click('#veritrans_cc_cc_type');
        $I->click('//*[@id="veritrans_cc_cc_type"]/option[2]');
        $I->waitForElementVisible('#veritrans_cc_cc_number');
        $I->fillField('#veritrans_cc_cc_number', '4012888888881881');
        //  month
        $I->click('#veritrans_cc_expiration');
        $I->click('//*[@id="veritrans_cc_expiration"]/option[2]');
        //year
        $I->click('#veritrans_cc_expiration_yr');
        $I->click('//*[@id="veritrans_cc_expiration_yr"]/option[3]');
        //what is this
        $I->click('a.cvv-what-is-this');
        $I->waitForElement('#payment-tool-tip');
        $I->click('#payment-tool-tip-close');
        $I->fillField('#veritrans_cc_cc_cid', '123');
        $I->scrollDown(150);
        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        $I->waitForElement('li.error-msg');
       //$I->see('Network Error, E02004', '//li[@class="error-msg"]');
        try {
            $I->waitForText('The requested Payment Method is not available.!');
        } catch (Exception $e){$I->waitForText('Authorization process has an error');}
        $I->resetCookie('rCookie');

        

    }

    function checkoutWithGiftCard ()
    {
        $I = $this;
        $I->checkOnShoppingCart();
        $I->scrollDown(600);
        $I->click('#giftvoucher');
        $I->waitForElementVisible('#giftvoucher_code');
        $I->fillField('#giftvoucher_code','GIFT-ADFA-12NF0O');
        $I->click('//div[@class="input-box"]/button/span');
        $I->see('Gift code "GIFT-XXXX-XXXXXX" has been applied successfully.' ,'li.success-msg');
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');

        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',20);
        $I->see('No Payment Information Required','#checkout-payment-method-load > label');
        $I->checkDataForGuest();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',20);
        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        $I->waitForText('Thank you for your purchase!',200);
        $I->see('YOUR ORDER HAS BEEN RECEIVED.','h1');
        $I->click('//div[@class="buttons-set"]/button/span');
        $I->waitForElement('//*[@class="nivo-imageLink"]/img');
    }

    function checkoutForGuestPayPal(){
        $I = $this;
        $I->checkOnShoppingCart();
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
        $I->checkDataForGuest();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',60);
        $I->click('//*[@id="p_method_paypal_express"]');
        $I->waitForText('You will be redirected to the PayPal website.', 60);

        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        $I->waitForElement('//li[@class="error-msg"]');
        $I->see('PayPal gateway has rejected request.', '//li[@class="error-msg"]');
        $I->resetCookie('rCookie');

    }

    function checkoutAddingDifferentAddress (){
        $I =$this;
        $I->checkOnShoppingCart();
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
        $I->checkDataForGuest();
        $I->wait(1);
        $I->click('#shipping\3A different_shipping');
        $I->checkDataForGuestShippingAddress();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',50);
        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        /// test for example
    }

    function createYouShipping() {
        $I = $this;

        $I->checkOnShoppingCart();
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
        $I->checkDataForGuest();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',60);
        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[2]');

    }
    /*
     *  function checkoutForGuestPayPal(){
        $I = $this;
        $I->checkOnShoppingCart();
        $I->see('PROCEED TO CHECKOUT', 'button.button.btn-proceed-checkout.btn-checkout > span');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span');
        $I->checkDataForGuest();
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',60);
        $I->click('//*[@id="p_method_paypal_express"]');
        $I->waitForText('You will be redirected to the PayPal website.', 60);
        $I->click('#edit_shipping_document_confirmation');
        $I->click('//*[@id="edit_shipping_document_confirmation"]/option[4]');
        $I->click('#onestepcheckout-button-place-order');
        $I->waitForElement('//div[@id="billingModule"]',60);
        // $I->see('Unable to communicate with PayPal gateway','li.error-msg');
        $I->see('Create a PayPal account','div.body.clearfix.zoom > div.subhead');
        $I->seeElement('#miniCart');

    }
     */


}