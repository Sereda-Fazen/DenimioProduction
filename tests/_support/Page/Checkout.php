<?php
namespace Page;

class Checkout
{
    //js form to auth

    public static $waitLinkForm = '//*[@id="onestepcheckout-login-link"]';
    public static $waitForm = '//*[@id="onestepcheckout-login-popup-contents-login"]';
    public static $login = '//*[@id="id_onestepcheckout_username"]';
    public static $pass = '//*[@id="id_onestepcheckout_password"]';
    public static $submit = '//*[@id="onestepcheckout-login-button"]';
    public static $seeUser = '//*[@id="billing-address-select"]';

    // shipping address

    public static $checkBoxShipping = '//*[@id="shipping:different_shipping"]';
    public static $shippingAddress = '//*[@id="showhide_shipping"]';
    public static $selectShipping = '//select[@id="shipping-address-select"]';
    public static $shippingForm = '//div[@class="shipping_address"]';

    //form
    public static $shippingFirstName = '//*[@id="shipping-new-address-form"]//li//input';
    public static $shippingLastName = '//*[@id="shipping-new-address-form"]//li/div[2]//input';
    public static $shippingPhone = '//*[@id="shipping-new-address-form"]//li[2]/div//input';
    public static $shippingNewAddress = '//*[@id="shipping-new-address-form"]//li[3]/div//input';
    public static $shippingCountry = '//*[@id="shipping-new-address-form"]//li[4]//select';
    public static $shippingCity = '//*[@id="shipping-new-address-form"]//li[4]/div[2]//input';
    public static $shippingZipCode = '//*[@id="shipping-new-address-form"]//li[5]//input';
    public static $shippingState = '//*[@id="shipping-new-address-form"]//li[5]/div[2]//select';
    public static $saveShipping = '//*[@id="shipping:save_in_address_book"]';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }


    public function getAuthorization($login, $pass){
        $I = $this->tester;
        $I->waitForElement(self::$waitLinkForm);
        $I->click(self::$waitLinkForm);
        $I->waitForElementVisible(self::$waitForm);
        $I->fillField(self::$login, $login);
        $I->fillField(self::$pass, $pass);
        $I->click(self::$submit);
        $I->waitForAjax(10);
        $I->waitForElement(self::$seeUser);

        return $this;

    }

    public function getShippingAddress(){
        $I = $this->tester;
        $I->click(self::$checkBoxShipping);
        $I->waitForElement(self::$shippingAddress);
        $I->selectOption(self::$selectShipping, 'New Address');
        $I->waitForElement(self::$shippingForm);
    }

    public function typeDataShipping()
    {
        $I = $this->tester;
        $I->waitForElement(self::$shippingFirstName);
        $I->fillField(self::$shippingFirstName, 'Test');
        $I->fillField(self::$shippingLastName, 'Test2');
        $I->fillField(self::$shippingPhone, '8968473726');
        $I->fillField(self::$shippingNewAddress, 'Test, Street Test2');
        $I->selectOption(self::$shippingCountry, 'United States');
        $I->fillField(self::$shippingCity, 'California');
        $I->fillField(self::$shippingZipCode, '34678');
        $I->selectOption(self::$shippingState, 'California');
        $I->click(self::$saveShipping);





    }




}