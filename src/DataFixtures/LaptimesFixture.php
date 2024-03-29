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

        $race2 = new Races();
        $race2->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-08"));
        $race2->setTrack("Track B");
        $race2->setTime(\DateTime::createFromFormat('H:i:s' , "11:00:00"));

        $race3 = new Races();
        $race3->setDate(\DateTime::createFromFormat('Y-m-d', "2020-02-08"));
        $race3->setTrack("Track A");
        $race3->setTime(\DateTime::createFromFormat('H:i:s' , "12:00:00"));

        $manager->persist($race1);
        $manager->persist($race2);
        $manager->persist($race3);

        $user1 = new User();
        $user1->setUsername("Racer1");
        $plainPassword1 = "pass";
        $encodedPassword1=$this->passwordEncoder->encodePassword($user1,$plainPassword1);
        $user1->setPassword($encodedPassword1);
        #$user1->setPassword('pass');
        $user1->setRole('ROLE_USER');

        $user2 = new User();
        $user2->setUsername("Emp1");
        $plainPassword2 = "pass";
        $encodedPassword2=$this->passwordEncoder->encodePassword($user2,$plainPassword2);
        $user2->setPassword($encodedPassword2);
        #$user2->setPassword('pass');
        $user2->setRole('ROLE_STAFF');

        $user3 = new User();
        $user3->setUsername("admin");
        $plainPassword3 = "admin";
        $encodedPassword3 = $this->passwordEncoder->encodePassword($user3,$plainPassword3);
        $user3->setPassword($encodedPassword3);
        #$user3->setPassword('admin');
        $user3->setRole('ROLE_ADMIN');

        $user4 = new User();
        $user4->setUsername("Racer2");
        $plainPassword4 = "pass";
        $encodedPassword4=$this->passwordEncoder->encodePassword($user4,$plainPassword4);
        $user4->setPassword($encodedPassword4);
        #$user1->setPassword('pass');
        $user4->setRole('ROLE_USER');

        $user5 = new User();
        $user5->setUsername("Racer3");
        $plainPassword5 = "pass";
        $encodedPassword5=$this->passwordEncoder->encodePassword($user5,$plainPassword5);
        $user5->setPassword($encodedPassword5);
        #$user1->setPassword('pass');
        $user5->setRole('ROLE_USER');

        $user6 = new User();
        $user6->setUsername("Racer4");
        $plainPassword6 = "pass";
        $encodedPassword6=$this->passwordEncoder->encodePassword($user6,$plainPassword6);
        $user6->setPassword($encodedPassword6);
        #$user1->setPassword('pass');
        $user6->setRole('ROLE_USER');

        $user7 = new User();
        $user7->setUsername("Racer5");
        $plainPassword7 = "pass";
        $encodedPassword7=$this->passwordEncoder->encodePassword($user7,$plainPassword7);
        $user7->setPassword($encodedPassword7);
        #$user1->setPassword('pass');
        $user7->setRole('ROLE_USER');

        $user8 = new User();
        $user8->setUsername("Racer6");
        $plainPassword8 = "pass";
        $encodedPassword8=$this->passwordEncoder->encodePassword($user8,$plainPassword8);
        $user8->setPassword($encodedPassword8);
        #$user1->setPassword('pass');
        $user8->setRole('ROLE_USER');

        $user9 = new User();
        $user9->setUsername("Racer7");
        $plainPassword9 = "pass";
        $encodedPassword9=$this->passwordEncoder->encodePassword($user9,$plainPassword9);
        $user9->setPassword($encodedPassword9);
        #$user1->setPassword('pass');
        $user9->setRole('ROLE_USER');

        $user10 = new User();
        $user10->setUsername("Racer8");
        $plainPassword10 = "pass";
        $encodedPassword10=$this->passwordEncoder->encodePassword($user10,$plainPassword10);
        $user10->setPassword($encodedPassword10);
        #$user1->setPassword('pass');
        $user10->setRole('ROLE_USER');

        $user11 = new User();
        $user11->setUsername("Racer9");
        $plainPassword11 = "pass";
        $encodedPassword11=$this->passwordEncoder->encodePassword($user11,$plainPassword11);
        $user11->setPassword($encodedPassword11);
        #$user1->setPassword('pass');
        $user11->setRole('ROLE_USER');

        $user12 = new User();
        $user12->setUsername("Racer10");
        $plainPassword12 = "pass";
        $encodedPassword12=$this->passwordEncoder->encodePassword($user12,$plainPassword12);
        $user12->setPassword($encodedPassword1);
        #$user1->setPassword('pass');
        $user12->setRole('ROLE_USER');

        $user13 = new User();
        $user13->setUsername("Racer11");
        $plainPassword13 = "pass";
        $encodedPassword13=$this->passwordEncoder->encodePassword($user13,$plainPassword13);
        $user13->setPassword($encodedPassword13);
        #$user1->setPassword('pass');
        $user13->setRole('ROLE_USER');

        $user14 = new User();
        $user14->setUsername("Racer12");
        $plainPassword14 = "pass";
        $encodedPassword14=$this->passwordEncoder->encodePassword($user14,$plainPassword14);
        $user14->setPassword($encodedPassword14);
        #$user1->setPassword('pass');
        $user14->setRole('ROLE_USER');

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);
        $manager->persist($user7);
        $manager->persist($user8);
        $manager->persist($user9);
        $manager->persist($user10);
        $manager->persist($user11);
        $manager->persist($user12);
        $manager->persist($user13);
        $manager->persist($user14);

        // $product = new Product();
        // $manager->persist($product);

        $laptime1 = new Laptimes();
        $laptime1->setUser($user1);
        $laptime1->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:55"));
        $laptime1->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:04"));
        $laptime1->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:39"));
        $laptime1->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:38"));
        $laptime1->setRaces($race1);
        $laptime1->setFinished("yes");

        $laptime2 = new Laptimes();
        $laptime2->setUser($user12);
        $laptime2->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:02:01"));
        $laptime2->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:15"));
        $laptime2->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime2->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:06:06"));
        $laptime2->setRaces($race1);
        $laptime2->setFinished("yes");

        $laptime3 = new Laptimes();
        $laptime3->setUser($user13);
        $laptime3->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime3->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime3->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime3->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:41"));
        $laptime3->setRaces($race1);
        $laptime3->setFinished("no");

        $laptime4 = new Laptimes();
        $laptime4->setUser($user10);
        $laptime4->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:57"));
        $laptime4->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:06"));
        $laptime4->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:41"));
        $laptime4->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:44"));
        $laptime4->setRaces($race1);
        $laptime4->setFinished("yes");

        $laptime5 = new Laptimes();
        $laptime5->setUser($user4);
        $laptime5->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:00:56"));
        $laptime5->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:01:05"));
        $laptime5->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:00:40"));
        $laptime5->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:02:41"));
        $laptime5->setRaces($race2);
        $laptime5->setFinished("yes");

        $laptime6 = new Laptimes();
        $laptime6->setUser($user5);
        $laptime6->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:00:51"));
        $laptime6->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:01:00"));
        $laptime6->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:00:55"));
        $laptime6->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:02:56"));
        $laptime6->setRaces($race2);
        $laptime6->setFinished("yes");

        $laptime7 = new Laptimes();
        $laptime7->setUser($user6);
        $laptime7->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:00:55"));
        $laptime7->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:01:04"));
        $laptime7->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:00:39"));
        $laptime7->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:02:38"));
        $laptime7->setRaces($race2);
        $laptime7->setFinished("yes");

        $laptime8 = new Laptimes();
        $laptime8->setUser($user7);
        $laptime8->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:00:56"));
        $laptime8->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:01:00"));
        $laptime8->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:00:40"));
        $laptime8->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:02:36"));
        $laptime8->setRaces($race2);
        $laptime8->setFinished("yes");

        $laptime9 = new Laptimes();
        $laptime9->setUser($user8);
        $laptime9->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime9->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime9->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime9->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:41"));
        $laptime9->setRaces($race3);
        $laptime9->setFinished("yes");

        $laptime10 = new Laptimes();
        $laptime10->setUser($user9);
        $laptime10->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime10->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime10->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime10->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:41"));
        $laptime10->setRaces($race3);
        $laptime10->setFinished("yes");

        $laptime11 = new Laptimes();
        $laptime11->setUser($user1);
        $laptime11->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime11->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime11->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:20"));
        $laptime11->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:21"));
        $laptime11->setRaces($race3);
        $laptime11->setFinished("yes");

        $laptime12 = new Laptimes();
        $laptime12->setUser($user13);
        $laptime12->setLap1(\DateTime::createFromFormat('H:i:s' ,"0:01:56"));
        $laptime12->setLap2(\DateTime::createFromFormat('H:i:s' ,"0:02:05"));
        $laptime12->setLap3(\DateTime::createFromFormat('H:i:s' ,"0:01:40"));
        $laptime12->setTotal(\DateTime::createFromFormat('H:i:s' ,"0:05:41"));
        $laptime12->setRaces($race3);
        $laptime12->setFinished("yes");

        $manager->persist($laptime1);
        $manager->persist($laptime2);
        $manager->persist($laptime3);
        $manager->persist($laptime4);
        $manager->persist($laptime5);
        $manager->persist($laptime6);
        $manager->persist($laptime7);
        $manager->persist($laptime8);
        $manager->persist($laptime9);
        $manager->persist($laptime10);
        $manager->persist($laptime11);
        $manager->persist($laptime12);

        $manager->flush();
    }
}
