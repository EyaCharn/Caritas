<?php

namespace EvenementBundle\Repository;

/**
 * evenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class evenementRepository extends \Doctrine\ORM\EntityRepository
{

    public function filterEvenement($nom,$array){
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.nomEvenement LIKE :nom')
            ->andWhere('p.id_theme IN (:themes)')
            ->setParameter('themes',$array)
            ->setParameter('nom','%'.$nom.'%')
            ->getQuery()->getResult();
        return $qb;
    }
}
