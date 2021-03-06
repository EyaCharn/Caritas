<?php

namespace ReclamationBundle\Repository;

/**
 * ReclamationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReclamationRepository extends \Doctrine\ORM\EntityRepository
{
    public  function maxid(){

       /* $q = $em->createQueryBuilder()
            ->select('MAX(e.id)')
            ->from('ReclamationBundle:Reclamation', 'e')
            ->getQuery()
            ->getSingleScalarResult();
        return $query=$q->getSingleScalarResult();*/

        $last_entity = $em->createQueryBuilder()
            ->select('e')
            ->from('YourBundle:Entity', 'e')
            ->orderBy('e.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        return $query=$last_entity->getSingleScalarResult();
    }
    public function findbyuserclaimer()
    {
        $Query=$this->getEntityManager()->createQuery(
            "Select a.userclaimer, COUNT(a.id) as st 
            from ReclamationBundle:reclamation a
            GROUP BY a.userclaimer"
        );
        return $Query->getArrayResult();
    }
}
