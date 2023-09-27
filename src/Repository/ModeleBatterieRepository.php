<?php

namespace App\Repository;

use App\Entity\ModeleBatterie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModeleBatterie>
 *
 * @method ModeleBatterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeleBatterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeleBatterie[]    findAll()
 * @method ModeleBatterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeleBatterieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeleBatterie::class);
    }

//    /**
//     * @return ModeleBatterie[] Returns an array of ModeleBatterie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ModeleBatterie
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
