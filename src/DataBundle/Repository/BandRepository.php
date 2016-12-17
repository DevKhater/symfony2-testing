<?php

namespace DataBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BandRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BandRepository extends EntityRepository
{

    public function findAllEntities($currentPage = 1, $limit)
    {

        $query = $this->createQueryBuilder('b')
                ->getQuery();

        $query->setFirstResult($limit * ($currentPage - 1)) // Offset
                ->setMaxResults($limit); // Limit

        $result = $query->getResult();
        return $result;
    }
    
    public function getAllGenres()
    {
        $genres = $this->getEntityManager()
                ->createQuery(
                'SELECT  DISTINCT a.genre FROM DataBundle:Band a')
                ->getResult();
        return $genres;
    }

    public function countAllEntities()
    {
        $query = $this->getEntityManager()
                ->createQuery(
                'SELECT  count(a) FROM DataBundle:Band a');
        $count = $query->getSingleScalarResult();
        return $count;
    }

    public function paginate($dql, $page = 1, $limit = 5)
    {
        $paginator = new Paginator($dql);
        //        $paginator->setUseOutputWalkers(false);
        $paginator->getQuery()
                ->setFirstResult($limit * ($page - 1)) // Offset
                ->setMaxResults($limit); // Limit

        return $paginator;
    }

}
