<?php

namespace App\Repository;

use App\Entity\Playlists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Playlists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Playlists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Playlists[]    findAll()
 * @method Playlists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaylistsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Playlists::class);
    }


//    /**
//     * @return Playlists[] Returns an array of Playlists objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Playlists
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
