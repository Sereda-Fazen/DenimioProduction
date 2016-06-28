<?php
namespace Page;

class Product
{

    //review

    public static $clickReview = '//p[@class="no-rating"]/a';
    public static $seeRating = 'fieldset';
    public static $checkRating = 'tr > td:nth-of-type(1) > input.radio';
    public static $nickName = '#nickname_field';
    public static $summary = '#summary_field';
    public static $review = '#review_field';
    public static $captcha = 'div.recaptcha-checkbox-checkmark';
    public static $submit = '//*[@id="review-form"]/div/button';
    public static $seeErrorReview = 'li.error-msg';
    public static $seeError = 'div.recaptcha > div.validation-advice';

    //add to cart and to wishList

    public static $addToCompare = '//ul[@class="add-to-links"]/li[1]';
    public static $seeCompare = '//a[@id="shopping_cart"]';

    public static $addToWishList = '//ul[@class="add-to-links"]/li[2]';
    public static $seeList = 'div.registered-users > div.content > p:nth-of-type(1)';






    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function checkMainBlockReview ($name,$summary,$review){
        $I = $this->tester;

       // $rait = $I->click('//tr[@class="first last odd"]/td['.rand(1,5).']/input');
       // $I->amOnPage('/the-flat-head-7013w-8oz-denim-work-shirt.html');
        $I->waitForElementVisible(self::$checkRating);
        $I->click(self::$checkRating);
        $I->fillField(self::$nickName, $name);
        $I->fillField(self::$summary, $summary);
        $I->click(self::$review);
        $I->fillField(self::$review, $review);
        //$I->moveMouseOver(self::$captcha);
        //$I->switchToIFrame('undefined');
       // $I->click(self::$captcha);
       // $I->wait(3);
        $I->click(self::$submit);
        $I->see('This is a required field.',self::$seeError);
       // $I->see('There was an error with the recaptcha code, please try again.',self::$seeErrorReview);
    }

    public function checkShareLinks ()
    {
        $I = $this->tester;
        $I->click(self::$addToCompare);
        $I->seeElement(self::$seeCompare);
        $I->reloadPage();

        $I->click(self::$addToWishList);
        $I->seeElement(self::$seeList);
        $I->moveBack();
    }





















}