<?php

namespace App\Repository;

use App\Entity\Visitors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Visitors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visitors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visitors[]    findAll()
 * @method Visitors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Visitors::class);
    }

    public function getMyVisitors($inviteid) {
    	return $this->createQueryBuilder('getVis')
		->findAll()
		->where('getVis.inviteid = :inviteid')
		->setParameter('inviteid', $inviteid)
		->getQuery()
		->getResult();
    }

    public function findAllVisitors() {
    	return $this->createQueryBuilder('getVisitors')
		->findAll()
		->getQuery()
		->getResult();
    }

//    /**
//     * @return Visitors[] Returns an array of Visitors objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
     */

    /*
    public function findOneBySomeField($value): ?Visitors
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
