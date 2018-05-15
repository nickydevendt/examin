<?php

namespace App\Repository;

use App\Entity\Affiliatedcompanys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Affiliatedcompanys|null find($id, $lockMode = null, $lockVersion = null)
 * @method Affiliatedcompanys|null findOneBy(array $criteria, array $orderBy = null)
 * @method Affiliatedcompanys[]    findAll()
 * @method Affiliatedcompanys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffiliatedcompanysRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Affiliatedcompanys::class);
    }

    public function findThreeCompanys() {
        $results = $this->createQueryBuilder('coms')
            ->orderBy('coms.id','DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        return $results;
    }

//    /**
//     * @return Affiliatedcompanys[] Returns an array of Affiliatedcompanys objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Affiliatedcompanys
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
