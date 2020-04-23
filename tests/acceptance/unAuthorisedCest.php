<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class unAuthorisedCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->canSee("Welcome to Karting D15!");
        $I->canSee("Login");
        $I->click("Login");
        $I->seeInCurrentUrl('/login');
        $I->fillField('username', 'Racer1');
        $I->fillField('password', 'pass');
        $I->click("Sign In");
        $I->seeInCurrentUrl('/welcome');
        $I->canSee("Welcome");
        $I->am('ROLE_USER');
        $I->amOnPage('/user');
        $I->canSee("Access Denied");
        $I->amOnPage('/races');
        $I->canSee("Access Denied");
        $I->amOnPage('/');
        $I->click("Logout");
        $I->amOnPage('/');
    }
}
