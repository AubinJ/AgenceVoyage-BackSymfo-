<?php

namespace App\Repository;

use App\Entity\AvReservationStatut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvReservationStatut>
 *
 * @method AvReservationStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvReservationStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvReservationStatut[]    findAll()
 * @method AvReservationStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvReservationStatutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvReservationStatut::class);
    }

    //    /**
    //     * @return AvReservationStatut[] Returns an array of AvReservationStatut objects
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

    //    public function findOneBySomeField($value): ?AvReservationStatut
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
