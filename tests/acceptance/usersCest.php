<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class usersCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer1']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer2']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer3']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer4']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer5']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer6']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer7']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer8']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer9']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer10']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer11']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Racer12']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Emp1']);
        $I->seeInRepository('App\Entity\User', ['username' => 'Admin']);
    }
}
