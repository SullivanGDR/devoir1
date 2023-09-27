<?php

namespace App\Repository;

use App\Entity\OperationRechargement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OperationRechargement>
 *
 * @method OperationRechargement|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationRechargement|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationRechargement[]    findAll()
 * @method OperationRechargement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationRechargementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationRechargement::class);
    }

//    /**
//     * @return OperationRechargement[] Returns an array of OperationRechargement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OperationRechargement
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
