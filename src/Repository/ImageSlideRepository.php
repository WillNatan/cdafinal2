<?php

namespace App\Repository;

use App\Entity\ImageSlide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageSlide|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageSlide|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageSlide[]    findAll()
 * @method ImageSlide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageSlideRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageSlide::class);
    }

//    /**
//     * @return ImageSlide[] Returns an array of ImageSlide objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageSlide
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
