<?php

namespace App\Repository;

use App\Entity\OrderStatusType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderStatusType|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderStatusType|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderStatusType[]    findAll()
 * @method OrderStatusType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderStatusTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderStatusType::class);
    }

    // /**
    //  * @return OrderStatusType[] Returns an array of OrderStatusType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderStatusType
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
