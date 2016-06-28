<?php
namespace Page;

use Exception;

class Login
{

    public static $URL = '/';
    public static $URL2 = 'customer/account/login/';
    public static $clickLogIn = 'a.login_click';

    public static $email = '#email';
    public static $pass = '#pass';
    public static $submit = '[name="send"] > span > span';

    public static $logout = 'li.dropit-trigger > a';

    public static $msg = 'div.col-main > p';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }



    public function login()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        try {$I->waitForElementVisible('i.mc_embed_close.fa.fa-times.disabled-start');
            $I->click('i.mc_embed_close.fa.fa-times.disabled-start'); } catch (Exception $e) {}
        $I->wait(2);
        $I->click(self::$clickLogIn);

    }


    public function loginInvalid($name, $password)
    {
        $I = $this->tester;
        $I->fillField(self::$email, $name);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);

        return $this;
    }

    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);
        $I->see('You have logged out and will be redirected to our homepage in 5 seconds.',self::$msg);

    }


}