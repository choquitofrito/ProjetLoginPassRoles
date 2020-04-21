<?php

namespace App\Repository;

use App\Entity\GroupeMusique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GroupeMusique|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeMusique|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeMusique[]    findAll()
 * @method GroupeMusique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeMusiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeMusique::class);
    }

    // /**
    //  * @return GroupeMusique[] Returns an array of GroupeMusique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeMusique
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
