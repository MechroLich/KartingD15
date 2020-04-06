<?php



namespace App\DataFixtures;
use App\Entity\Laptimes;
use App\Entity\User;
use App\Entity\Races;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LaptimesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $race1 = new Races();
        $race1->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-08"));
        $race1->setTrack("Track A");
        $race1->setTime(\DateTime::createFromFormat('H:i:s' , "11:00:00"));

        $manager->persist($race1);

        $user1 = new User();
        $user1->setUsername("Speed");
        $user1->setPassword("pass");
        $user1->setRoles([]);

        $user2 = new User();
        $user2->setUsername("Emp1");
        $user2->setPassword("pass");
        $user2->setRoles(["ROLE_STAFF"]);

        $user3 = new User();
        $user3->setUsername("admin");
        $user3->setPassword("admin");
        $user3->setRoles(["ROLE_ADMIN", "ROLE_STAFF"]);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);

        // $product = new Product();
        // $manager->persist($product);
        $laptime1 = new Laptimes();
        $laptime1->setUserId($user1);
        $laptime1->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime1->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime1->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime1->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:41"));
        $laptime1->setRaceId($race1);
        $laptime1->setFinished("yes");

        $manager->persist($laptime1);

        $manager->flush();
    }
}
