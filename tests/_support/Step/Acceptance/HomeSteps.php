<?php
namespace Step\Acceptance;

use Exception;

class HomeSteps extends \AcceptanceTester
{

    public function getCloseSub(){
        $I = $this;

        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
    }





    public function getCurrencyProd()
    {
        $I = $this;
        $seeCurr = '//span[@class="regular-price"]/span';

        $countCurrency = count($I->grabMultiple('//*[@class="sub-currency"]/li'));

        for ($c = 1; $c <= $countCurrency; $c++) {
            $I->wait(1);
            $I->moveMouseOver('li.currency-trigger > a');
            $I->click('//ul[@class="sub-currency"]/li[' . $c . ']/a');
            $I->grabTextFrom('//ul[@class="sub-currency"]/li[' . $c . ']/a');

            switch ($c) {


                case 1:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('AU', $seeCurr);
                    break;

                case 2:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('R', $seeCurr);
                    break;

                case 3:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('£', $seeCurr);
                    break;

                case 4:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('CA$', $seeCurr);
                    break;

                case 5:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('CN¥', $seeCurr);
                    break;

                case 6:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Dkr', $seeCurr);
                    break;

                case 7:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('€', $seeCurr);
                    break;

                case 8:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('HK$', $seeCurr);
                    break;

                case 9:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Rs', $seeCurr);
                    break;

                case 10:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Rp', $seeCurr);
                    break;

                case 11:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('¥', $seeCurr);
                    break;

                case 12:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('RM', $seeCurr);
                    break;

                case 13:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('MXN', $seeCurr);
                    break;

                case 14:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('NZ', $seeCurr);
                    break;

                case 15:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Nkr', $seeCurr);
                    break;

                case 16:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('₱', $seeCurr);
                    break;

                case 17:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('RON', $seeCurr);
                    break;


                case 18:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('RUB', $seeCurr);
                    break;


                case 19:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('S$', $seeCurr);
                    break;


                case 20:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('R', $seeCurr);
                    break;


                case 21:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('₩', $seeCurr);
                    break;

                case 22:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Skr', $seeCurr);
                    break;

                case 23:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('Fr.', $seeCurr);
                    break;

                case 24:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('฿', $seeCurr);
                    break;

                case 25:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->see('$', $seeCurr);
                    break;


            }
        }
    }


    public function getCurrency()
    {
        $I = $this;
        $seeCurr = '//div[@class="top-cart-title"]';
        $countCurrency = count($I->grabMultiple('//*[@class="sub-currency"]/li'));
        for ($c = 1; $c <= $countCurrency; $c++) {
            $I->wait(1);
            $I->moveMouseOver('li.currency-trigger > a');
            $I->click('//ul[@class="sub-currency"]/li[' . $c . ']/a');
            $I->grabTextFrom('//ul[@class="sub-currency"]/li[' . $c . ']/a');
            $I->reloadPage();

            switch ($c) {


                case 1:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('AU');
                    $I->see('AU', $seeCurr);
                    break;

                case 2:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('R');
                    $I->see('R', $seeCurr);
                    break;

                case 3:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('£');
                    $I->see('£', $seeCurr);
                    break;

                case 4:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('CA$');
                    $I->see('CA$', $seeCurr);
                    break;

                case 5:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('CN¥');
                    $I->see('CN¥', $seeCurr);
                    break;

                case 6:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Dkr');
                    $I->see('Dkr', $seeCurr);
                    break;

                case 7:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('€');
                    $I->see('€', $seeCurr);
                    break;

                case 8:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('HK$');
                    $I->see('HK$', $seeCurr);
                    break;

                case 9:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Rs0');
                    $I->see('Rs0', $seeCurr);
                    break;

                case 10:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Rp');
                    $I->see('Rp', $seeCurr);
                    break;

                case 11:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('¥');
                    $I->see('¥', $seeCurr);
                    break;

                case 12:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RM');
                    $I->see('RM', $seeCurr);
                    break;

                case 13:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('MXN');
                    $I->see('MXN', $seeCurr);
                    break;

                case 14:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('NZ');
                    $I->see('NZ', $seeCurr);
                    break;

                case 15:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Nkr');
                    $I->see('Nkr', $seeCurr);
                    break;

                case 16:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('₱');
                    $I->see('₱', $seeCurr);
                    break;

                case 17:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RON');
                    $I->see('RON', $seeCurr);
                    break;


                case 18:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('RUB0');
                    $I->see('RUB0', $seeCurr);
                    break;


                case 19:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('S$0');
                    $I->see('S$0', $seeCurr);
                    break;


                case 20:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('R0');
                    $I->see('R0', $seeCurr);
                    break;


                case 21:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('₩0');
                    $I->see('₩0', $seeCurr);
                    break;

                case 22:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Skr');
                    $I->see('Skr', $seeCurr);
                    break;

                case 23:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('Fr');
                    $I->see('Fr.', $seeCurr);
                    break;

                case 24:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('฿0');
                    $I->see('฿0', $seeCurr);
                    break;

                case 25:
                    echo
                    $I->waitForElement($seeCurr);
                    $I->getVisibleText('$');
                    $I->see('$', $seeCurr);
                    break;

            }

        }


    }

    public function getLanguageDev()
    {
        $I = $this;
        $seeLanguage = 'a.login_click';
        $seeCompare = '//*[@class="block block-list block-compare"]//div/p';
        //$arabic = 'a.sa';
        $countLanguage = count($I->grabMultiple('//*[@class="sub-lang"]/li'));
        for ($l = 1; $l <= $countLanguage; $l++) {
            $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
            $I->click('//*[@class="sub-lang"]/li[' . $l . ']');
            $I->grabTextFrom('//*[@class="sub-lang"]/li[' . $l . ']');

            switch ($l) {


                case 1:
                    echo $I->see('Log In', $seeLanguage);
                    $I->getVisibleText('Anda belum memilih produk untuk dibandingkan.', $seeCompare);
                    break;

                case 2:
                    echo
                    $I->see('เข้าสู่ระบบ', $seeLanguage);
                    $I->getVisibleText('คุณไม่มีรายการสินค้าที่จะเปรียบเทียบ.', $seeCompare);
                    break;

                case 3:
                    echo
                    $I->see('ログイン', $seeLanguage);
                    $I->getVisibleText('比較する商品はありません', $seeCompare);

                    break;

                case 4:
                    echo
                    $I->see('登录', $seeLanguage);
                    $I->getVisibleText('您没有可比较商品', $seeCompare);

                    break;

                case 5:
                    echo
                    $I->see('로그인', $seeLanguage);
                    $I->getVisibleText('비교 상품이 없습니다.', $seeCompare);
                    break;

                case 6:
                    echo
                    $I->see('Log Masuk', $seeLanguage);
                    $I->getVisibleText('Tiada item untuk dibanding.', $seeCompare);
                    break;

                case 7:
                    echo
                    $I->see('Войти', $seeLanguage);
                    $I->getVisibleText('У вас нет товаров для сравнения.', $seeCompare);
                    break;

                case 8:
                    echo $I->see('Connexion', $seeLanguage);
                    $I->getVisibleText('Vous n\'avez pas d\'articles à comparer.', $seeCompare);
                    break;

                case 9:
                    echo $I->see('Anmelden', $seeLanguage);
                    $I->getVisibleText('Sie haben keine Artikel auf der Vergleichsliste.', $seeCompare);
                    break;

                case 10:
                    echo $I->see('Accedi', $seeLanguage);
                    $I->getVisibleText('Non hai articoli da confrontare.', $seeCompare);
                    break;

                case 11:
                    echo
                    $I->see('Entrar', $seeLanguage);
                    $I->getVisibleText('Você não tem itens para comparar.', $seeCompare);
                    break;

                case 12:
                    echo
                    $I->see('Inicio De Sesión', $seeLanguage);
                    $I->getVisibleText('No tiene artículos para comparar.', $seeCompare);
                    break;

                case 13:
                    echo $I->see('Login', $seeLanguage);
                   // $I->getVisibleText('Anda belum memilih produk untuk dibandingkan.', $seeCompare);
                    break;

            }
        }
        $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
        $I->click('//*[@class="sub-lang"]/li[1]');

    }

    /**
     * Main menu
     */

    public function getMainMenu(){
        $I = $this;
        $main = count($I->grabMultiple('//div[@class="pt_custommenu"]/div'));
        for ($m = 1; $m <= $main; $m++){

            switch ($m){
                case 1:
                    $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Tops"]');
                    $I->click('//div[@class="pt_custommenu"]//span[text()="Tops"]');
                    $I->seeLink('Tops','//div[@class="breadcrumbs"]//li[2]/a[ @href="top.html"]');
                    break;

                case 2:
                    $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Bottoms"]');
                    $I->click('//div[@class="pt_custommenu"]//span[text()="Bottoms"]');
                    $I->seeLink('Bottoms','//div[@class="breadcrumbs"]//li[2]/a[ @href="bottom.html"]');
                    break;

                case 3:
                    $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Accessories"]');
                    $I->click('//div[@class="pt_custommenu"]//span[text()="Accessories"]');
                    $I->seeLink('Accessories','//div[@class="breadcrumbs"]//li[2]/a[ @href="accessories.html"]');
                    break;

                case 4:
                    $I->waitForElement('//div[@class="pt_custommenu"]//a[@href="new-arrivals.html"]/span');
                    $I->click('//div[@class="pt_custommenu"]//a[@href="new-arrivals.html"]/span');
                    $I->seeLink('New Arrivals','//div[@class="breadcrumbs"]//li[2]/a[ @href="new-arrivals.html"]');
                    break;

                case 5:
                    $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Brands"]');
                    $I->click('//div[@class="pt_custommenu"]//span[text()="Brands"]');
                    $I->seeLink('Brands','//div[@class="breadcrumbs"]//li[2]/a[ @href="brands.html"]');
                    break;

                case 6:
                    $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Footwear"]');
                    $I->click('//div[@class="pt_custommenu"]//span[text()="Footwear"]');
                    $I->seeLink('Footwear','//div[@class="breadcrumbs"]//li[2]/a[ @href="footwear.html"]');
                    break;

                case 7:
                    $I->waitForElement('//div[@class="pt_custommenu"]//a[@href="womens-kids.html"]/span');
                    $I->click('//div[@class="pt_custommenu"]//a[@href="womens-kids.html"]/span');
                    $I->seeLink('Womens & Kids','//div[@class="breadcrumbs"]//li[2]/a[ @href="womens-kids.html"]');
                    break;

                case 8:
                    try {
                        $I->waitForElement('//div[@class="pt_custommenu"]//span[text()="Calendar"]');
                        $I->click('//div[@class="pt_custommenu"]//span[text()="Calendar"]');
                        $I->waitForText('RESTOCK SCHEDULE');
                        break;
                    } catch (Exception $e){}


            }
        }



    }



    public function getHeaderLinks(){
        $I = $this;
        $links = count($I->grabMultiple('//*[@id="menu_link"]/li'));
        $I->getCloseSub();
        for ($menu = 1; $menu <= $links; $menu++){
            $I->moveMouseOver('a.login_click > i.fa.fa-caret-down');
            $I->waitForElement('//*[@class="dropit-trigger"]//ul/li['.$menu.']');
            $I->click('//*[@class="dropit-trigger"]//ul/li['.$menu.']');
            try{$I->waitForElement('//*[@class="header-static"]/a/img'); $I->click('//*[@class="header-static"]/a/img');}catch (Exception $e){}


        }
        $I->click('a.logo > img');
    }

    public function getWrongSearch(){
        $I = $this;
        $I->fillField('#search','wrong');
        $I->click('i.fa.fa-search');
        $I->waitForText('Your search returns no results.');
        $I->see('Your search returns no results.','p.note-msg');
    }

    public function getSearchOnCategory(){
        $I = $this;
        $I->fillField('#search','jeans');
        $cat =  count($I->grabMultiple('//*[@id = "cat"]/option'));
            $I->click('#cat');
            $I->waitForElement('//*[@id = "cat"]/option['.rand(1,$cat).']');
            $I->click('//*[@id = "cat"]/option['.rand(1,$cat).']');
            $I->click('i.fa.fa-search');
            $I->waitForText('SEARCH RESULTS FOR \'JEANS\'');

    }


    public function getSubcategoryTops(){
        $I = $this;

        $sub =  count($I->grabMultiple('//*[@id="block112"]/div/div/a'));
        for ($t = 1; $t <= $sub; $t++) {
            $I->moveMouseOver('//*[@class="parentMenu"]');
            $I->waitForElementVisible('//*[@id="block112"]/div[1]/div/a['.$t.']/span');
            $I->click('//*[@id="block112"]/div[1]/div/a['.$t.']/span');
            $I->seeElement('div.breadcrumbs > ul > li:nth-of-type(2) > a');
        }
    }
    public function getSubcategoryBottoms()
    {
        $I = $this;
        $sub2 = count($I->grabMultiple('//*[@id="block113"]/div/div/a'));
        for ($b = 1; $b <= $sub2; $b++) {
            $I->moveMouseOver('//*[@id="pt_menu13"]/div[1]/a/span');
            $I->waitForElementVisible('//*[@id="block113"]/div[1]/div/a['.$b.']/span');
            $I->click('//*[@id="block113"]/div[1]/div/a['.$b.']/span');

            $I->seeElement('div.breadcrumbs > ul > li:nth-of-type(2) > a');
        }
    }

    public function getInformationLinksFooter(){
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        $I->getCloseSub();
        $info = count($I->grabMultiple('//*[@class="footer-static-content row-fluid"]/ul/li/a'));

        for($i = 1; $i <= $info; $i++) {

            $I->scrollDown(1000);
            $I->waitForElement('//*[@class="footer-static-content row-fluid"]/ul/li['.$i.']/a');
            $I->click('//*[@class="footer-static-content row-fluid"]/ul/li['.$i.']/a');
            try {
                $I->waitForElement('//div[@class="logo"]//img');
                $I->moveBack();} catch (Exception $e){}
        }
    }


    public function getSecondOpen() {
        $I = $this;
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);

        });
    }


    public function getCheckRandomBrands()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->waitForElement('//div[@id="pt_custommenu"]//span[text()="Brands"]');
        $I->click('//div[@id="pt_custommenu"]//span[text()="Brands"]');
        $I->waitForElement('//div[@class="main"]');
        $brands = rand(1,count($I->grabMultiple('//div[@class="products-grid row"]/div')));
        $I->click('//div[@class="products-grid row"]/div['.$brands.']//a//img');
        $I->seeElement('li.view > a > strong');
        $I->scrollDown(150);
        $I->seeElement('div.category-products');
    }


    public function getCheckFeaturedBrands()
    {
        $I = $this;
        $I->amOnPage('/');

        $featured = count($I->grabMultiple('//*[@id="featured-brands"]/div[1]/div'));
        for ($f = 1; $f <= $featured; $f++) {
            $I->moveMouseOver('//*[@id="featured-brands"]/div[1]/div['.$f.']');
            $I->wait(1);
            $I->see('SHOP ALL' ,'//*[@class="brand-overlay"]/span');
        }

        $featured2 = count($I->grabMultiple('//div[2][@class="row"]/div'));
        for ($fb = 1; $fb <= $featured2; $fb++) {
            $I->moveMouseOver('//div[2][@class="row"]/div['.$fb.']');
            $I->wait(1);
            $I->see('SHOP ALL' ,'//*[@class="brand-overlay"]/span');
        }

        $I->moveMouseOver('//*[@id="featured-brands"]/div[1]/div[1]');
        $I->click('//*[@class="brand-overlay"]/span');
        $I->see('Brands' ,'//li[@class="brand"]');
        $I->click('//li[@class="home"]');


        $cat = count($I->grabMultiple('//*[@id="featured-brands"]/div[1]/div[1]/div/div/ul/li'));
        for ($c = 1; $c <= $cat; $c++) {
            $I->click('//*[@id="featured-brands"]/div[1]/div[1]/div/div/ul/li['.$c.']/a');

            switch ($c) {

                case 1:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('New Arrivals', 'ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 2:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Tops','ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 3:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Bottoms', 'ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;

                case 4:
                    echo
                    $I->waitForElement('ul > li:nth-of-type(2) > strong');
                    $I->see('Accessories','ul > li:nth-of-type(2) > strong');
                    $I->moveBack();
                    break;
            }

        }


    }





    public function getLanguageProd()
    {
        $I = $this;
        $seeLanguage = 'a.login_click';
        $seeCompare = '//*[@class="block block-list block-compare"]//div/p';
        //$arabic = 'a.sa';
        $countLanguage = count($I->grabMultiple('//*[@class="sub-lang"]/li'));
        for ($l = 1; $l <= $countLanguage; $l++) {
            $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
            $I->click('//*[@class="sub-lang"]/li[' . $l . ']');
            $I->grabTextFrom('//*[@class="sub-lang"]/li[' . $l . ']');

            switch ($l) {


                case 2:
                    echo
                    $I->see('登录', $seeLanguage);
                    $I->getVisibleText('您没有可比较商品', $seeCompare);

                    break;

                case 3:
                    echo $I->see('Connexion', $seeLanguage);
                    $I->getVisibleText('Vous n\'avez pas d\'articles à comparer.', $seeCompare);
                    break;

                case 4:
                    echo $I->see('Anmelden', $seeLanguage);
                    $I->getVisibleText('Sie haben keine Artikel auf der Vergleichsliste.', $seeCompare);
                    break;

                case 5:
                    echo $I->see('Login', $seeLanguage);
                    $I->getVisibleText('Anda belum memilih produk untuk dibandingkan.', $seeCompare);
                    break;

                case 6:
                    echo $I->see('Accedi', $seeLanguage);
                    $I->getVisibleText('Non hai articoli da confrontare.', $seeCompare);
                    break;

                case 7:
                    echo
                    $I->see('ログイン', $seeLanguage);
                    $I->getVisibleText('比較する商品はありません', $seeCompare);

                    break;

                case 8:
                    echo
                    $I->see('로그인', $seeLanguage);
                    $I->getVisibleText('비교 상품이 없습니다.', $seeCompare);
                    break;

                case 9:
                    echo
                    $I->see('Log Masuk', $seeLanguage);
                    $I->getVisibleText('Tiada item untuk dibanding.', $seeCompare);
                    break;

                case 10:
                    echo
                    $I->see('Entrar', $seeLanguage);
                    $I->getVisibleText('Você não tem itens para comparar.', $seeCompare);
                    break;

                case 11:
                    echo
                    $I->see('Войти', $seeLanguage);
                    $I->getVisibleText('У вас нет товаров для сравнения.', $seeCompare);
                    break;

                case 12:
                    echo
                    $I->see('Inicio De Sesión', $seeLanguage);
                    $I->getVisibleText('No tiene artículos para comparar.', $seeCompare);
                    break;

                case 13:
                    echo
                    $I->see('เข้าสู่ระบบ', $seeLanguage);
                    $I->getVisibleText('คุณไม่มีรายการสินค้าที่จะเปรียบเทียบ.', $seeCompare);
                    break;


            }
        }
        $I->moveMouseOver('//i[@class="fa fa-caret-down"]');
        $I->click('//*[@class="sub-lang"]/li[1]');

    }



}