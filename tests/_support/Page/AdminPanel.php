<?php
namespace Page;

use Exception;

class AdminPanel
{

    /**
     * Include gift card
     */

    public static $clickSettings = '#nav > li:nth-of-type(15) > ul > li:nth-of-type(6) > a > span';
    public static $showsGiftCard = '//div[@class="entry-edit"]';
    public static $clickCheckoutPage = '//div[@class="entry-edit"]/div[4]';
    public static $showsText = 'Show Gift Card box in the Payment section';
    public static $clickSelectBox = '//select[@id="giftvoucher_interface_payment_show_gift_card"]';
    public static $yes = '//select[@id="giftvoucher_interface_payment_show_gift_card"]/option[1][contains(text(), "Yes")]';
    public static $saveSettings = '//td[@class="form-buttons"]/button';





    /**
     * Gift card
     */
    public static $moveGiftCard = '#nav > li:nth-of-type(15) > a > span';
    public static $clickManageGiftCards = '#nav > li:nth-of-type(15) > ul > li:nth-of-type(1) > a > span';
    public static $addGiftCard = '//td[@class="form-buttons"]/button[2]/span';
    public static $giftCode = '#gift_code';
    public static $giftValue = '#balance';
    public static $currency = '//select[@id="currency"]';
    public static $currencyUS = '//select[@id="currency"]/option[24]';
    public static $template = '#giftcard_template_id';
    public static $imgForGift = '//div[@id="gift-image-carosel"]';
    public static $cadenceGiftCard = '//select[@id="giftcard_template_id"]/option[11]';
    public static $status = '#status';
    public static $active = '//select[@id="status"]/option[2]';
    public static $comment = '#giftvoucher_comments';
    public static $saveCard = '//div[@class="content-header"]/p/button[3]';

    /**
     * Points
     */

    public static $moveCustomers = '#nav > li:nth-of-type(5) > a > span';
    public static $clickManageCustomers = '#nav > li:nth-of-type(5) > ul > li:nth-of-type(1) > a > span';
    public static $searchUser = '//div[@class="field-100"]/input';
    public static $clickSearch = '//td[@class="filter-actions a-right"]/button[2]/span';
    public static $clickEmail = '//*[@id="customerGrid_table"]/tbody/tr/td[4][contains(text(), "denimio_test@yahoo.com")]';
    public static $rewardPoints = '//*[@class="tabs"]/li[3]/a';
    public static $changeBalance = '//*[@id="rewardpoints_change_balance"]';
    public static $saveCustomers = '//*[@class="scalable save"]/span';
    public static $seeAddPoints = '//li[@class="success-msg"]';





    protected $tester;
    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
    public function createAddToGiftCard($giftCardCode, $giftValue, $comment)
    {
        $I = $this->tester;
        $I->moveMouseOver(self::$moveGiftCard);
        $I->waitForElementVisible(self::$clickManageGiftCards);
        $I->click(self::$clickManageGiftCards);
        $I->waitForElementVisible(self::$addGiftCard);
        $I->click(self::$addGiftCard);
        $I->fillField(self::$giftCode, $giftCardCode);
        $I->fillField(self::$giftValue, $giftValue);
        $I->click(self::$currency);
        $I->waitForElement(self::$currencyUS);
        $I->click(self::$currencyUS);
        $I->click(self::$template);
        $I->waitForElement(self::$cadenceGiftCard);
        $I->click(self::$cadenceGiftCard);
        $I->waitForElementVisible(self::$imgForGift);
        $I->click(self::$status);
        $I->waitForElementVisible(self::$active);
        $I->click(self::$active);
        $I->fillField(self::$comment, $comment);
        $I->click(self::$saveCard);
        //$I->see('Gift Code was successfully saved', self::$success);
    }


    public function createPoints($email ,$points)
    {
        $I = $this->tester;
        $I->moveMouseOver(self::$moveCustomers);
        $I->waitForElementVisible(self::$clickManageCustomers);
        $I->click(self::$clickManageCustomers);
        $I->waitForElementVisible(self::$searchUser);
        $I->fillField(self::$searchUser, $email);
        $I->click(self::$clickSearch);
        $I->waitForElement(self::$clickEmail, 40);
        $I->moveMouseOver(self::$clickEmail);
        $I->click(self::$clickEmail);
        $I->waitForElement(self::$rewardPoints);
        $I->click(self::$rewardPoints);
        $I->fillField(self::$changeBalance, $points);
        $I->click(self::$saveCustomers);
        $I->waitForElement(self::$seeAddPoints);
        $I->see('The customer has been saved.', self::$seeAddPoints);
        
    }

    public function includeGiftCard(){
        $I = $this->tester;
        $I->moveMouseOver(self::$moveGiftCard);
        $I->waitForElement(self::$clickSettings);
        $I->click(self::$clickSettings);
        $I->waitForElement(self::$showsGiftCard);
        $I->click(self::$clickCheckoutPage);
        $I->waitForText(self::$showsText);
        $I->click(self::$clickSelectBox);
        $I->click(self::$yes);
        $I->click(self::$saveSettings);
        $I->waitForElement(self::$seeAddPoints);
        $I->see('The configuration has been saved.',self::$seeAddPoints);

    }

}