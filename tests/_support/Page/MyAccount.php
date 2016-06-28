<?php
namespace Page;
use Exception;
class MyAccount
{

    /**
     * Account Dashboard
     */

    public static $viewMyRewards = 'strong.rewardpoints-money > a';
    public static $seeView = 'p > strong';

    public static $changePass = 'div.box-content > p > a';
    public static $h1 = 'h1';

    public static $edit = '//*[@class="box-title"]/a';

    public static $editNewsletter = '//*[@class="col-2"]/div/div/a';

    public static $editAddress = 'div.box-content > div:first-child > address > a';
    public static $editAddress2 = 'div.box-content > div:nth-of-type(2) > address > a';

    public static $manageAddress = 'div.dashboard > div:nth-of-type(5) > div:nth-of-type(3) > div.box > div.box-title > a';


    /**
     * Account Dashboard
     */

    public static $url = '//div[@class="block-content"]//a[text()="Account Dashboard"]';


    /**
     * Account Information
     */
    public static $URL = '//div[@class="block-content"]//a[text()="Account Information"]';
    public static $firsName = '#firstname';
    public static $lastName = '#lastname';
    public static $email = '#email';
    public static $change = '#change_password';
    public static $current = '#current_password';
    public static $pass = '#password';
    public static $confirmation = '#confirmation';
    public static $submit = 'div.buttons-set > button.button';

    /**
     *  Address Book
     */
    public static $URL2 = '//div[@class="block-content"]//a[text()="Address Book"]';
    public static $addAddress = 'div.page-title.title-buttons > button.button > span > span';
    public static $addressName = '#firstname';
    public static $addressLastName = '#lastname';
    public static $addressEmail = '#email_address';
    public static $phone = '#telephone';
    public static $street = 'ul.form-list > li:nth-of-type(1) > div.input-box > input.input-text.required-entry';
    public static $city = '#city';
    public static $zip = '#zip';
    public static $state = '//*[@id="country"]/option[231]';
    public static $region = '//*[@id="region"]';
    public static $submit2 = 'div.buttons-set > button.button > span > span';
    /**
     * My Orders
     */
    public static $URL3 = '//div[@class="block-content"]//a[text()="My Orders"]';
    public static $orders = '//table[@id="my-orders-table"]';
    // after orders
    /**
     *  Reviews Product
     */
    public static $clickReviews = '//div[@class="block-content"]//a[text()="My Product Reviews"]';
    public static $back = 'p.back-link > a';

    /**
     * My Tags
     */
    public static $myTags = '//div[@class="block-content"]//a[text()="My Tags"]';
    /**
     * My WishList
     */
    public static $myWishList = '//div[@class="block-content"]//a[text()="My Wishlist"]';
    public static $wishList = '//*[@id="wishlist-table"]';





    /**
     * Newsletter Subscriptions
     */
    public static $newsletter = '//div[@class="block-content"]//a[text()="Newsletter Subscriptions"]';
    public static $buttonSave = '//div[@class="my-account"]//button//span[text()="Save"]';
    public static $clickCheck = '#subscription';

    /**
     * My Out of Stock
     */

    public static $myOutStock = '//div[@class="block-content"]//a[text()="My Out of Stock Subscriptions"]';


    /**
     * My Price
     */

    public static $myPrice = '//div[@class="block-content"]//a[text()="My Price Subscriptions"]';

    /**
     * XX012Contest delete
     */

    public static $XX012Contest = '//div[@class="block-content"]//a[text()="XX012 Contest"]';
    public static $browse = '#customer-upload > div.qq-uploader > div.qq-upload-button > input';
    public static $deleteContest = '//*[@class="calcel-account"]//span';

    /**
     * XX012Contest add
     */

    public static $agree = '//*[@class="buttons-set"]/button/span';
    public static $validAgree = '#advice-validate-one-required-by-name-terms_conditions';
    public static $selectAgree = '#terms_conditions';
    public static $see = 'li.success-msg';






    /**
     * Giff Card
     */
    public static $giffCard = '//div[@class="block-content"]//a[text()="Gift Card"]';
    public static $viewBlock = 'button.form-button.button.addredeem > span > span';
    public static $viewDetail = 'a.left';
    public static $noGiftCard = 'div.gift-card > div:nth-of-type(2)';
    // add gift card
    public static $add = 'button.form-button.button.addredeem > span';
    public static $enterGiftCard = '#gift-voucher-code';
    public static $addToMyList = 'div.text-left > button:nth-of-type(2) > span';

    public static $remove = '//span[@class="giftvoucher-grid-detail"]//a[text()="Remove"]';

    /**
     * My Rewards
     */

    public static $myRewards = '//div[@class="block-content"]//a[@href ="/rewardpoints/"]';
    public static $rewardsInformation = 'div.box-account.box-info.box-rewardpoints-summary > div.box-head > h2';
    //point

    public static $pointTr = '#rewardpoints-navigation-rewardpoints\.navigation > li:nth-of-type(3) > a';
    public static $seePoint = 'div.col-main';

    public static $referFriends = '#rewardpoints-navigation-rewardpoints\.navigation > li:nth-of-type(4) > a';
    public static $seeRefer = 'div.rewardpointsreferfriends-content > strong';

    public static $settings = '#rewardpoints-navigation-rewardpoints\.navigation > li.last';
    public static $seeSettings = 'div.buttons-set > button.button > span';
    public static $success = 'li.success-msg';
    public static $error = 'li.error-msg';

    /**
     * My Tickets
     */

    public static $myTickets = '//div[@class="block-content"]//a[text()="My Tickets"]';
    public static $seeTickets = 'div.my-account > div:first-child > div:nth-of-type(2) > div';




    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function back(){
        $I = $this->tester;

    }



    public function accountDashboard() {

        $I = $this->tester;
        $I->click(self::$viewMyRewards);
        $I->see('Your balance',self::$seeView);
        $I->moveBack();

        $I->click(self::$changePass);
        $I->see('EDIT ACCOUNT INFORMATION',self::$h1);
        $I->moveBack();

        $I->click(self::$edit);
        $I->see('EDIT ACCOUNT INFORMATION',self::$h1);
        $I->moveBack();

        $I->click(self::$editNewsletter);
        $I->see('NEWSLETTER SUBSCRIPTION',self::$h1);
        $I->moveBack();

        $I->click(self::$editAddress);
        $I->see('EDIT ADDRESS',self::$h1);
        $I->moveBack();
        $I->click(self::$editAddress2);
        $I->see('EDIT ADDRESS',self::$h1);
        $I->moveBack();
        $I->click(self::$manageAddress);
        $I->see('ADDRESS BOOK',self::$h1);
        $I->moveBack();

    }



    public function accountInfo($fName,$lName,$email,$current, $pass1, $pass2) {
        $I = $this->tester;
        $I->click(self::$URL);

        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);
        $I->click(self::$change);
        $I->fillField(self::$current, $current);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);
        $I->scrollDown(100);
        $I->click(self::$submit);

    }
    public function accountInfoAdd($fName,$lName,$email,$current, $pass1, $pass2) {
        $I = $this->tester;
        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);

        $I->fillField(self::$current, $current);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);
        $I->scrollDown(100);
        $I->click(self::$submit);

    }
    
    public function accountAddress($fName,$lName,$phone,$street, $region, $city, $zip) {
        $I = $this->tester;
        $I->click(self::$URL2);
        $I->waitForElement(self::$addAddress);
        $I->click(self::$addAddress);

        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$phone, $phone);
        $I->fillField(self::$street, $street);
        $I->fillField(self::$city, $city);
        $I->fillField(self::$zip, $zip);
        $I->click(self::$state);
        $I->fillField(self::$region, $region);
        $I->scrollDown(100);
        $I->click(self::$submit2);
        $I->waitForElement(self::$success);
    }

    public function accountNewAddress($fName,$lName,$phone,$street, $region, $city, $zip) {
        $I = $this->tester;

        $I->waitForElement(self::$addAddress);
        $I->click(self::$addAddress);

        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$phone, $phone);
        $I->fillField(self::$street, $street);
        $I->fillField(self::$city, $city);
        $I->fillField(self::$zip, $zip);
        $I->click(self::$state);
        $I->fillField(self::$region, $region);
        $I->scrollDown(100);
        $I->click(self::$submit2);
        $I->waitForElement(self::$success);
    }




    public function accountMyOrders() {
        $I = $this->tester;
        $I->click(self::$URL3);
        try {
            $I->getVisibleText('You have placed no orders.');
        } catch (Exception $e) {
            $I->waitForElement(self::$orders);
            $I->click(self::$back);
        }
    }
    public function accountProductReviews() {
        $I = $this->tester;
        $I->click(self::$clickReviews);
        try {
            $I->getVisibleText('You have submitted no reviews.');
            $I->click(self::$back);
        }catch (Exception $e) {}
    }

    public function accountMyTags() {
        $I = $this->tester;
        $I->click(self::$myTags);
        $I->getVisibleText('You have not tagged any products yet.');
        $I->click(self::$back);
    }

    public function accountMyWishList() {
        $I = $this->tester;
        $I->click(self::$myWishList);
        try {$I->getVisibleText('You have no items in your wishlist.');
            $I->click(self::$back);
        } catch (Exception $e) {
            $I->waitForElement(self::$wishList);
            $I->click(self::$back);

        }
    }


    public function accountNewsletterSave() {
        $I = $this->tester;
        $I->click(self::$newsletter);
        $I->click(self::$buttonSave);
        $I->see('The subscription has been saved.', self::$success);
    }
    public function accountNewsletterDelete() {
        $I = $this->tester;
        $I->click(self::$newsletter);
        $I->click(self::$clickCheck);
        $I->click(self::$buttonSave);
        $I->see('The subscription has been removed.', self::$success);
    }

    public function accountNewsletterDefault() {
        $I = $this->tester;
        $I->click(self::$newsletter);
        $I->click(self::$clickCheck);
        $I->click(self::$buttonSave);
        $I->see('The subscription has been saved.', self::$success);
    }


    public function accountMyOutStock() {
        $I = $this->tester;
        $I->click(self::$myOutStock);
        $I->getVisibleText('There are no active subscriptions.');
        $I->click(self::$back);
    }

    public function accountMyPrice() {
        $I = $this->tester;
        $I->click(self::$myPrice);
        $I->getVisibleText('There are no active subscriptions.');
        $I->click(self::$back);
    }
    

    public function accountXX012ContestAdd()
    {
        $I = $this->tester;
        $I->click(self::$XX012Contest);
        $I->click(self::$agree);
        $I->seeElement(self::$validAgree);

        $I->click(self::$selectAgree);
        $I->click(self::$agree);
        $I->getVisibleText('Click Browse and choose a file from your computer to upload.');
    }

    public function accountXX012ContestDelete() {
        $I = $this->tester;
        $I->waitForElement(self::$browse);
        $I->click(self::$deleteContest);
        $I->acceptPopup();
        $I->see('Your XX012 Contest account was successfully deleted', self::$success);
    }




    public function accountGiftCard(){
        $I = $this->tester;
        $I->click(self::$giffCard);

        $I->click(self::$viewDetail);
        $I->seeElement(self::$noGiftCard);
        $I->moveBack();

        //$I->click(self::$viewBlock);

    }

    public function accountGiftCardIsNot($giftCard)
    {
        $I = $this->tester;

        $I->click(self::$add);
        $I->fillField(self::$enterGiftCard, $giftCard);
        $I->click(self::$addToMyList);
        $I->see('The gift code has been added to your list successfully.',self::$success );

    }

    public function removeGiftCard(){
        $I = $this->tester;
        $I->waitForElement(self::$remove);
        $I->click(self::$remove);
        $I->acceptPopup();
        $I->waitForElement(self::$success);

    }



    public function accountMyRewards() {
        $I = $this->tester;
        $I->click(self::$myRewards);
        $I->seeElement(self::$rewardsInformation);

        $I->click(self::$pointTr);
        $I->seeElement(self::$seePoint);

        $I->click(self::$referFriends);
        $I->getVisibleText('Share the referring link or coupon code with your friends and earn points.');

        $I->click(self::$settings);
        $I->seeElement(self::$seeSettings);
        $I->click(self::$seeSettings);
        $I->see('Your settings has been updated successfully.',self::$success);
        $I->click(self::$url);


    }

    public function accountMyTickets() {
        $I = $this->tester;
        $I->click(self::$myTickets);
        $I->getVisibleText('You dont have any tickets');


    }


}