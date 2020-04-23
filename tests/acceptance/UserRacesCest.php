<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserRacesCest
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

        $I->click("Laptimes");
        $I->click("Your Races");
        $I->canSee("All Races User In");

        $I->click("Laptimes");
        $I->click("Race Present");
        $I->canSee("no records found");
        $I->click("Get Race");
        $I->cantSee("no records found");

        $I->click("Laptimes");
        $I->click("Report of a Race");
        $I->canSee("no records found");
        $I->click("Get Race");
        $I->cantSee("no records found");
        $I->canSee("Slowest Time");
        $I->canSee("Fastest Time");
        $I->canSee("Average Time to Complete All Laps");

        $I->click("Laptimes");
        $I->click("Report on all Races");
        $I->canSee("Track A");
        $I->canSee("track B");
        $I->canSee("Slowest Time");
        $I->canSee("Fastest Time");
        $I->canSee("Average Time to Complete All Laps");
    }
}
