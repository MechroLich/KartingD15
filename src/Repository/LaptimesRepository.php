<?php

namespace App\Repository;

use App\Entity\Laptimes;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Laptimes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laptimes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laptimes[]    findAll()
 * @method Laptimes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaptimesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Laptimes::class);
    }

    /**
     * @return Laptimes[] Returns an array of Laptimes objects
     */

    public function findMyRaces($value)
    {
        //debugging purposes
        dump($this->createQueryBuilder('l')
            ->andWhere('l.user = :val')
            ->setParameter('val', $value)
            //->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult());

        return $this->createQueryBuilder('l')
            ->andWhere('l.user = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllRaceTimes($value)
    {
        //debugging purposes, find all laptimes/races user was in and each other users time
        //TODO must add way user can only see races they were in
        dump($this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult());

        return $this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function raceLapReport($value)
    {
        //debugging purposes, find all laptimes/races user was in and each other users time
        //TODO develop race lap report
        dump($this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult());

        return $this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    public function allRaceLapReport($value)
    {
        //debugging purposes, find all laptimes/races user was in and each other users time
        //TODO develop lap report for ass races
        dump($this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult());

        return $this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Laptimes
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
