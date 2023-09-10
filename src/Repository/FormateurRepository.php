<?php

namespace App\Repository;

use App\Entity\Formateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formateur>
 *
 * @method Formateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formateur[]    findAll()
 * @method Formateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formateur::class);
    }

    // public function calculateStatistics()
    // {
    //     $qb = $this->createQueryBuilder('r');
    //     $qb->select('COUNT(r.id) as totalSpecialite')
    //        ->addSelect('SUM(CASE WHEN r.specialite = :montageVideo THEN 1 ELSE 0 END) as montageVideoCount')
    //        ->addSelect('SUM(CASE WHEN r.specialite = :DevelopementInformatique THEN 1 ELSE 0 END) as DevelopementCount')
    //        ->addSelect('SUM(CASE WHEN r.specialite = :EconomieGestion THEN 1 ELSE 0 END) as ecoCount')
    //        ->setParameter('montageVideo', 'Montage Video')
    //        ->setParameter('DevelopementInformatique', 'Developement Informatique')
    //        ->setParameter('EconomieGestion', 'Economie Gestion');
    
    //     $result = $qb->getQuery()->getSingleResult();
    
    //     return $result;
    // }

//    /**
//     * @return Formateur[] Returns an array of Formateur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Formateur
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
