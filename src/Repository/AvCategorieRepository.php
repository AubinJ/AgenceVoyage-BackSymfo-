<?php

namespace App\Repository;

use App\Entity\AvCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvCategorie>
 *
 * @method AvCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvCategorie[]    findAll()
 * @method AvCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvCategorie::class);
    }

    //    /**
    //     * @return AvCategorie[] Returns an array of AvCategorie objects
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

    //    public function findOneBySomeField($value): ?AvCategorie
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
