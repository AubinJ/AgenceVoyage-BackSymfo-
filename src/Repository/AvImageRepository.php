<?php

namespace App\Repository;

use App\Entity\AvImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvImage>
 *
 * @method AvImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvImage[]    findAll()
 * @method AvImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvImage::class);
    }

    //    /**
    //     * @return AvImage[] Returns an array of AvImage objects
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

    //    public function findOneBySomeField($value): ?AvImage
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
