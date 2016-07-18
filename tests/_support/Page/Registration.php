<?php
namespace Page;

use Exception;

class Registration
{

    public static $URL = '/';
    public static $logIn = '//a[@class="login_click"]';
    public static $createAccount = 'div.new-users > div.buttons-set > button.button > span > span';
    public static $firsName = '#firstname';
    public static $lastName = '#lastname';
    public static $email = '#email_address';
    public static $subscription = '#is_subscribed';
    public static $pass = '#password';
    public static $confirmation = '#confirmation';
    public static $submit = '//div[@class="buttons-set"]//button//span[text()="Submit"]';
    public static $logout = 'li.dropit-trigger > a';
    protected $tester;
    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
    public function registerInvalid($fName,$lName,$email, $pass1, $pass2)
    {
        $I = $this->tester;

        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);
        $I->click(self::$subscription);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);
        $I->waitForElement(self::$submit);
        $I->click(self::$submit);
        return $this;
    }

    public function register(){
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->waitForElement(self::$logIn);
        $I->click(self::$logIn);
        $I->waitForElement(self::$createAccount);
        $I->click(self::$createAccount);

    }
    

    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);
    }
}
