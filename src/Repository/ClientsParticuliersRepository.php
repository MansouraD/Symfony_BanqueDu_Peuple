<?php

namespace App\Repository;

use App\Entity\ClientsParticuliers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientsParticuliers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientsParticuliers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientsParticuliers[]    findAll()
 * @method ClientsParticuliers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientsParticuliersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientsParticuliers::class);
    }

    // /**
    //  * @return ClientsParticuliers[] Returns an array of ClientsParticuliers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClientsParticuliers
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
