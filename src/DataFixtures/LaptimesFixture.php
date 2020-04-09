<?php



namespace App\DataFixtures;
use App\Entity\Laptimes;
use App\Entity\User;
use App\Entity\Races;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LaptimesFixture extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $race1 = new Races();
        $race1->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-08"));
        $race1->setTrack("Track A");
        $race1->setTime(\DateTime::createFromFormat('H:i:s' , "11:00:00"));

        $manager->persist($race1);

        $user1 = new User();
        $user1->setUsername("Speed");
        $plainPassword1 = "pass";
        $encodedPassword1=$this->passwordEncoder->encodePassword($user1,$plainPassword1);
        $user1->setPassword($encodedPassword1);
        #$user1->setPassword('pass');
        $user1->setRoles(['ROLE_USER']);

        $user2 = new User();
        $user2->setUsername("Emp1");
        $plainPassword2 = "pass";
        $encodedPassword2=$this->passwordEncoder->encodePassword($user2,$plainPassword2);
        $user2->setPassword($encodedPassword2);
        #$user2->setPassword('pass');
        $user2->setRoles(['ROLE_STAFF']);

        $user3 = new User();
        $user3->setUsername("admin");
        $plainPassword3 = "admin";
        $encodedPassword3 = $this->passwordEncoder->encodePassword($user3,$plainPassword3);
        $user3->setPassword($encodedPassword3);
        #$user3->setPassword('admin');
        $user3->setRoles(['ROLE_ADMIN', 'ROLE_STAFF']);

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
