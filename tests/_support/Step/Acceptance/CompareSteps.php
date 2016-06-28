<?php
namespace Step\Acceptance;

use Exception;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class CompareSteps extends \AcceptanceTester
{

        public function getCloseSub(){
            $I = $this;

            try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
                $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
            $I->wait(2);
        }

        public function addToCompareWallet(){
            $I = $this;
            $I->amOnPage('/');
            $I->fillField('#search', 'wallet');
            $I->click('//i[@class="fa fa-search"]');
            $I->waitForText('SEARCH RESULTS FOR \'WALLET\'');
        }


        public function addToCartForCompare()
        {
            $I = $this;
            $I->amOnPage('/');

            $I->click('//*[@class="parentMenu"]/a/span');
            $I->waitForElementVisible('div.block-content > p.empty');
            $I->see('You have no items to compare.','div.block-content > p.empty');


            $I->moveMouseOver('//div[@class="category-products"]/ul/li[3]//div/div');
            $I->click('//div[@class="category-products"]/ul/li[3]//div/div/div/ul/li');
            $I->waitForElement('//*[@id="go_list_compare"]',30);
            $I->waitForElementVisible('//*[@id="go_list_compare"]');
            $I->click('//*[@id="go_list_compare"]');

            $I->executeInSelenium(function (RemoteWebDriver $webdriver) {
                $handles = $webdriver->getWindowHandles();
                $last_window = end($handles);
                $webdriver->switchTo()->window($last_window);

            });


            $I->see('COMPARE PRODUCTS', 'h1');
            $I->click('//*[@class="button btn-cart"]/span');
            $I->click('//*[@class="buttons-set"]/button/span');

            $I->switchToWindow();

            $I->see('Please specify the product', 'li.notice-msg');


            }

    public function addToCartWithOptionItem()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->addToCompareWallet();

        $I->moveMouseOver('//div[@class="category-products"]/ul[1]/li[1]//div/div');
        $I->wait(2);
        $I->click('//div[@class="category-products"]/ul[1]/li[1]//div/div/div/ul/li');
        $I->waitForElement('//*[@id="go_list_compare"]',30);
        $I->click('//*[@id="go_list_compare"]');

        $I->executeInSelenium(function (RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });


        $I->see('COMPARE PRODUCTS', 'h1');
        $I->click('//*[@class="button btn-cart"]/span');
        $I->click('//*[@class="buttons-set"]/button/span');

        $I->switchToWindow();

        $I->seeElement('li.success-msg');
        $I->see('was added to your shopping cart.', 'li.success-msg > ul > li > span');


    }



        public function compareClosePage()
        {
            $I = $this;
            $I->see('COMPARE PRODUCTS', 'h1');
            $I->waitForElement('body > div:nth-of-type(4)');
            $I->click('//*[@class="buttons-set"]/button/span');

            $I->executeInSelenium(function (RemoteWebDriver $webdriver) {
                $handles = $webdriver->getWindowHandles();
                $last_window = end($handles);
                $webdriver->switchTo()->window($last_window);

            });
            $I->see('(2)' ,'//*[@class="block block-list block-compare"]/div/strong/span/small');
            //$I->click('//*[@class="actions"]/button/span');

            $I->wait(5);
            $I->click('//*[@class="actions"]/a');
            $I->acceptPopup();
            $I->see('The comparison list was cleared.' ,'li.success-msg');

        }




    public function removeItemFromComparePage()
    {
        $I = $this;
        $count = rand(1,count($I->grabMultiple('//*[@class="first last"]')));
        $I->amOnPage('/');
        $I->click('//*[@class="parentMenu"]/a/span');
        $I->waitForElementVisible('div.block-content > p.empty');
        $I->see('You have no items to compare.', 'div.block-content > p.empty');

                //$countItems = count($I->grabMultiple('//*[@class="products-grid row"]/li'));
                for ($c = 1; $c <= 2; $c++) {
                    $I->moveMouseOver('//div[@class="category-products"]/ul/li['.$c.']//div/div');
                    $I->wait(2);
                    $I->click('//div[@class="category-products"]/ul/li['.$c.']//div/div/div/ul/li');
                    $I->waitForElementVisible('//a[@id="continue_shopping"]',40);
                    $I->click('//a[@id="continue_shopping"]');
                }

        $I->moveMouseOver('//div[@class="category-products"]/ul/li[3]//div/div');
        $I->wait(2);
        $I->click('//div[@class="category-products"]/ul/li[3]//div/div/div/ul/li');
        $I->waitForAjax(20);
        $I->waitForElement('//*[@id="go_list_compare"]');
        $I->waitForElementVisible('//*[@id="go_list_compare"]');
        $I->click('//*[@id="go_list_compare"]');


        $I->executeInSelenium(function (RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });

        $I->waitForElement('//*[@class="first last"]/td['.$count.']/a');
        $I->click('//*[@class="first last"]/td['.$count.']/a');
        $I->waitForElementNotVisible('//*[@class="btn-remove"]',30);

        $I->click('//*[@class="buttons-set"]/button/span');
        $I->switchToWindow();
        $I->waitForElement('li.success-msg > ul > li > span', 30);
        $I->see('has been removed from comparison list.', 'li.success-msg > ul > li > span');
    }


    public function removeItemFromCategory()
    {
        $I = $this;

        $I->amOnPage('/');
        $I->click('//*[@class="parentMenu"]/a/span');
        $I->waitForElementVisible('div.block-content > p.empty');
        $I->see('You have no items to compare.', 'div.block-content > p.empty');

        for ($c = 1; $c <= 2; $c++) {
            $I->moveMouseOver('//div[@class="category-products"]/ul/li['.$c.']//div/div');
            $I->wait(2);
            $I->click('//div[@class="category-products"]/ul/li['.$c.']//div/div/div/ul/li');
            $I->waitForElementVisible('//a[@id="continue_shopping"]',40);
            $I->click('//a[@id="continue_shopping"]');
        }
        $I->waitForText('COMPARE PRODUCTS (2)', 30);
        $I->waitForElement('//div[@class="block-content"]//li/a[1]');
        $I->click('//ol[@id="compare-items"]/li[2]//a');
        $I->acceptPopup();
        $I->waitForText('COMPARE PRODUCTS (1)', 30);
        //$I->waitForText('You have no items to compare.',30);

        $I->click('//*[@class="actions"]/a');
        $I->acceptPopup();
        $I->moveBack();
        $I->see('The comparison list was cleared.', 'li.success-msg');

    }


















    /*
     *  public function compareAddToCart3()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('//*[@class="parentMenu"]/a/span');
        $I->waitForElementVisible('div.block-content > p.empty');
        $I->see('You have no items to compare.', 'div.block-content > p.empty');

        //$countItems = count($I->grabMultiple('//*[@class="products-grid row"]/li'));
        for ($c = 1; $c <= 3; $c++) {
            $I->moveMouseOver('//div[@class="category-products"]/ul['.$c.']/li[1]');
            $I->waitForElementVisible('div.category-products > ul:nth-of-type(' . $c . ') > li.item.first > div.item-inner > div.images-content > div.actions > div.actions-inner > ul.add-to-links > li:first-child > a.link-compare');
            $I->click('div.category-products > ul:nth-of-type(' . $c . ') > li.item.first > div.item-inner > div.images-content > div.actions > div.actions-inner > ul.add-to-links > li:first-child > a.link-compare');
            $I->scrollDown(100);
            $I->waitForElementVisible('body > div.wrapper_box > div:nth-of-type(3) > a');
            $I->click('body > div.wrapper_box > div:nth-of-type(4) > a');
            //$I->see('(1)', '//*[@class="block block-list block-compare"]/div/strong/span/small');
            $I->see('COMPARE', '//*[@class="block block-list block-compare"]/div/div/button');


        }
     */







    /*
     *    public function compareDelete()
    {
        $I = $this;
        $I->click('//*[@class="buttons-set"]/button/span');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });
        $I->click('//*[@class="buttons-set"]/button/span');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });

        $I->waitForElement('//*[@class="first last"]/td/a');
        $I->click('//*[@class="first last"]/td/a');
        $I->wait(2);
        $I->waitForElement('#compare-list-please-wait');


        $I->waitForElementNotVisible('//*[@class="first last"]/td/a');
        $I->click('//*[@class="buttons-set"]/button/span');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });
        $I->wait(5);
        $I->scrollUp(400);
        $I->seeElement('//*[@class="success-msg"]/ul');

    }

     */









}