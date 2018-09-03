<?php

namespace App\Repository;

use App\Entity\Musiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Musiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Musiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Musiques[]    findAll()
 * @method Musiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusiquesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Musiques::class);
    }

//    /**
//     * @return Musiques[] Returns an array of Musiques objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Musiques
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
