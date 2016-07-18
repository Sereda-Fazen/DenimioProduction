<?php
namespace Page;

use Exception;

class Extensions
{

    /**
     * Amasty Mostviewed
     */

    public static $url = '/';
    public static $moveTops = '//div[@class="pt_custommenu"]//span[text()="Tops"]';
    public static $tShirts = '//div[@class="pt_custommenu"]/div[3]/div[2]//a/span[text()="T-shirts"]';
    public static $add = '//div[@class="images-content"]';
    public static $cart = '//*[@class="actions"]//button';
    public static $selection = '//*[@class="row product-options"]';
    public static $size = '//*[@class="input-box"]/select';
    public static $addToCart = '//*[@class="add-to-cart"]//span';
    public static $showForm = '//*[@class="wrapper_box"]//p[contains(text(),"Item")]';
    public static $go = '//*[@id="shopping_cart"]';
    public static $based = '//*[@class="crosssell"]/h2[contains(text(), "Based")]';
    public static $item = '//ul[@id="crosssell-products-list"]/li[1]/a';

    /**
     * Check zoom
     */

    public static $wallet = '#search';
    public static $clickSearch = 'i.fa.fa-search';
    public static $h1 = 'h1';
    public static $itemWallet = '//*[@class="images-content"]//img';
    public static $itemPicture = '//*[@class="mousetrap"]';
    public static $picture = '//*[@class="bx-viewport"]//li[6]/a';
    public static $zoom = '//div[@id="cloud-zoom-big"]';

    /**
     * Price module
     */

    public static $moveCurrency  = 'li.currency-trigger > a';
    public static $usa = '//ul[@class="sub-currency"]/li/a[text()=" USD "]';

    public static $currency = '//div[@class="top-cart-title"]//span[2]';
    public static $addCart = '//*[@class="actions-inner"]//button';
    public static $continue = '//*[@id="wrapper_box_cart"]/div[3]/a';
    public static $headerCart = '//div[@class="top-cart-title"]';
    public static $showTablePrice = '//div[@class="top-cart-content"]';
    public static $subtotal = '//div[@class="top-cart-content"]/div/span[contains(text(), "$")]';
    public static $checkoutHeader = '//div[@class="top-cart-content"]//button/span';
    public static $orderReview = '//*[@id="checkout-review-table-wrapper"]//tbody[2]//td[3]//span';
    public static $grandTotal = '//*[@id="checkout-review-table-wrapper"]//tfoot/tr[4]/td[2]//span';
    public static $charge = '//*[@id="checkout-review-table-wrapper"]//tfoot/tr[5]/td[2]//span';













    protected $tester;
    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
    public function amastyMostViewed ($size)
    {
        $I = $this->tester;
        $I->amOnPage(self::$url);
        $I->moveMouseOver(self::$moveTops);
        $I->waitForElement(self::$tShirts);
        $I->click(self::$tShirts);
        $I->waitForElement(self::$add);
        $I->moveMouseOver(self::$add);
        $I->waitForElementVisible(self::$cart);
        $I->click(self::$cart);
        $I->waitForElement(self::$selection);
        $I->selectOption(self::$size, $size);
        $I->click(self::$addToCart);
        $I->waitForAjax(10);
        $I->waitForElement(self::$showForm);
        $I->click(self::$go);
        $I->waitForElement(self::$based);
        $I->click(self::$item);
        $I->waitForText('YOU MAY ALSO BE INTERESTED IN THE FOLLOWING PRODUCT(S)');

    }


    public function checkWallet()
    {
        $I = $this->tester;

        $I->amOnPage(self::$url);
        $I->fillField(self::$wallet, 'wallet');
        $I->click(self::$clickSearch);
        $I->see('SEARCH RESULTS FOR', self::$h1);
        $I->click(self::$itemWallet);
        $I->waitForElement(self::$itemPicture);
        $I->click(self::$picture);
        
        $I->waitForElement(self::$itemPicture);
        $I->moveMouseOver(self::$itemPicture);
        $I->waitForElementVisible(self::$zoom);
        
    }
    
    
    public function priceModule(){
        $I = $this->tester;
        $I->amOnPage(self::$url);
        $I->moveMouseOver(self::$moveCurrency);
        $I->waitForElement(self::$usa);
        $I->click(self::$usa);
        $I->see('$',self::$currency);

        $I->fillField(self::$wallet, 'wallet');
        $I->click(self::$clickSearch);
        $I->see('SEARCH RESULTS FOR', self::$h1);
        $I->moveMouseOver(self::$itemWallet);
        $I->waitForElement(self::$addCart);
        $I->click(self::$addCart);
        $I->waitForAjax(10);
        $I->waitForElement(self::$showForm);

       // $I->click(self::$continue);
        $I->reloadPage();

        $I->waitForElement(self::$headerCart);
        $I->moveMouseOver(self::$headerCart);
        $I->waitForElementVisible(self::$showTablePrice);
        $I->waitForElement(self::$subtotal);
        $I->waitForElementVisible(self::$checkoutHeader);
        $I->click(self::$checkoutHeader);
        $I->see('$',self::$orderReview);
        $I->waitForElementNotVisible('//div[@class="ajax-loader3"]',20);
        $I->see('$',self::$grandTotal);
        $I->see('¥',self::$charge);
    }

}