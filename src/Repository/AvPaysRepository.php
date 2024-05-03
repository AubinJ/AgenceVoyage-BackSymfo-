<?php

namespace App\Repository;

use App\Entity\AvPays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvPays>
 *
 * @method AvPays|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvPays|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvPays[]    findAll()
 * @method AvPays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvPaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvPays::class);
    }

    //    /**
    //     * @return AvPays[] Returns an array of AvPays objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AvPays
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
