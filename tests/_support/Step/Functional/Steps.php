<?php
namespace Step\Functional;

class Steps extends \FunctionalTester
{

    public function login(){
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        $I->seeElement('//div[@class="buttons-set"]//span');
        $I->fillField('//*[@name="login[username]"]', 'denimio_test@yahoo.com');
        $I->fillField('//*[@name="login[password]"]', '123456');
        $I->click('//div[@class="buttons-set"]//span');
        $I->seeInCurrentUrl('/customer/account/');
        $I->click('//li[@class="dropit-trigger"]/a');
        $I->seeInCurrentUrl('/');
    }

    public function forgotPass()
    {
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        $I->seeElement('.buttons-set');
        $I->click('Forgot Your Password?', '.buttons-set');
        $I->seeInCurrentUrl('/customer/account/forgotpassword/');
        $I->fillField('#email_address', 'denimio_test@yahoo.com');
        $I->seeElement('.buttons-set');
        $I->click('Submit', '.buttons-set');
        $I->seeInCurrentUrl('/customer/account/login/');
        $I->see('reset your password.', '.messages');
    }
    public function yahoo(){
        $I = $this;
        $I->amOnUrl('https://mail.yahoo.com');
        $I->seeElement('#login-username');
        $I->fillField('#login-username', 'denimio_test@yahoo.com');
        $I->seeElement('#login-signin');
        $I->click('login-signin');
        $I->seeElement('#login-passwd');
        $I->fillField('#login-passwd', 'fJ4qEn5Y');
        $I->seeElement('#login-signin');
        $I->click('login-signin');


    }
    
    

































}