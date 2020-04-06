<?php

namespace App\Repository;

use App\Entity\Laptimes;
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

    // /**
    //  * @return Laptimes[] Returns an array of Laptimes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

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