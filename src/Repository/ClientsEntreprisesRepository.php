<?php

namespace App\Repository;

use App\Entity\ClientsEntreprises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientsEntreprises|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientsEntreprises|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientsEntreprises[]    findAll()
 * @method ClientsEntreprises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientsEntreprisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientsEntreprises::class);
    }

    // /**
    //  * @return ClientsEntreprises[] Returns an array of ClientsEntreprises objects
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
    public function findOneBySomeField($value): ?ClientsEntreprises
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
