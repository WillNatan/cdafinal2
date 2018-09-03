<?php

namespace App\Repository;

use App\Entity\Telechargements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Telechargements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Telechargements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Telechargements[]    findAll()
 * @method Telechargements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelechargementsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Telechargements::class);
    }


//    /**
//     * @return Telechargements[] Returns an array of Telechargements objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Telechargements
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
