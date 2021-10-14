<?php

namespace App\Repository;

use App\Entity\FOTW;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FOTW|null find($id, $lockMode = null, $lockVersion = null)
 * @method FOTW|null findOneBy(array $criteria, array $orderBy = null)
 * @method FOTW[]    findAll()
 * @method FOTW[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FOTWRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FOTW::class);
    }

    // /**
    //  * @return FOTW[] Returns an array of FOTW objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FOTW
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
