<?php

namespace App\Repository;

use App\Entity\Fotw;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fotw|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fotw|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fotw[]    findAll()
 * @method Fotw[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FotwRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fotw::class);
    }

    // /**
    //  * @return Fotw[] Returns an array of Fotw objects
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

    public function findLatest(): ?Fotw
    {
        return $this->createQueryBuilder('fotw')
            ->select('fotw')
            ->innerjoin('App\Entity\Article', 'a', 'WITH', 'fotw.article = a.id')
            ->orderBy('a.date', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
