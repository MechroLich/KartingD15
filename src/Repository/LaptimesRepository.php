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

        return $this->createQueryBuilder('l')
            ->andWhere('l.user = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findUserRaces($value)
    {

        return $this->createQueryBuilder('l')
            ->andWhere('l.user = :val')
            ->setParameter('val', $value)
            //->orderBy('l.total', 'ASC') have to learn to sort by date
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByRacesID($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            ->addOrderBy('l.races', 'ASC')
            ->addOrderBy('l.finished', 'DESC')
            ->addOrderBy('l.total', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function avgTotal($value)
    {
        return $this->createQueryBuilder('l')
            ->select('avg(l.total)')
            ->andWhere('l.races = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }

    public function avgTotalTrack($value)
    {
        return $this->createQueryBuilder('l')
            ->select('avg(l.total)')
            ->andWhere('l.races in (:val)')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByRacesArrayID($value)
    {
       return $this->createQueryBuilder('l')
            ->andWhere('l.races in (:val)')
            ->setParameter('val', $value)
            ->andWhere('l.finished = :val2')
            ->setParameter('val2', "yes")
            ->addOrderBy('l.total', 'ASC')
            ->getQuery()
            ->getResult()
            ;
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
