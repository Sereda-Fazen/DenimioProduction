<?php
namespace Step\Acceptance;

use Exception;

class ExtensionsSteps extends \AcceptanceTester
{


    public function getCurrency()
    {
        $I = $this;
        $currency = '//div[@class="top-cart-title"]//span[2]';
        $orderReview = '//*[@id="checkout-review-table-wrapper"]//tbody[2]//td[3]//span';
        $grandTotal = '//*[@id="checkout-review-table-wrapper"]//tfoot/tr[4]/td[2]//span';
        $charge = '//*[@id="checkout-review-table-wrapper"]//tfoot/tr[5]/td[2]//span';
        for ($c = 1; $c <= 3; $c++) {

            $I->moveMouseOver('li.currency-trigger > a');


            switch ($c) {


                case 1:
                    echo
                    $I->waitForElement('//ul[@class="sub-currency"]/li/a[text()=" BRL "]');
                    $I->click('//ul[@class="sub-currency"]/li/a[text()=" BRL "]');
                    $I->see('R$', $currency);

                    $I->see('R$', $orderReview);
                    $I->see('R$', $grandTotal);
                    $I->see('¥', $charge);
                    break;

                case 2:
                    echo
                    $I->waitForElement('//ul[@class="sub-currency"]/li/a[text()=" THB "]');
                    $I->click('//ul[@class="sub-currency"]/li/a[text()=" THB "]');
                    $I->see('฿', $currency);

                    $I->see('฿', $orderReview);
                    $I->see('฿', $grandTotal);
                    $I->see('¥', $charge);
                    break;

                case 3:
                    echo
                    $I->waitForElement('//ul[@class="sub-currency"]/li/a[text()=" EUR "]');
                    $I->click('//ul[@class="sub-currency"]/li/a[text()=" EUR "]');
                    $I->see('€', $currency);

                    $I->see('€', $orderReview);
                    $I->see('€', $grandTotal);
                    $I->see('¥', $charge);
                    break;

            }
        }
    }


}