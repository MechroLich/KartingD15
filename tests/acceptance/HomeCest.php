<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class HomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->canSee("Welcome to Karting D15!");
    }
}
