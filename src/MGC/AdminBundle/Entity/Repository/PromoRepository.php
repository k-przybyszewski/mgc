<?php

namespace MGC\AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * PromoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PromoRepository extends EntityRepository
{
    public function getAllPaginate($options = array())
    {
        $defaults = array(
                'page' => 1,
                'maxPerPage' => 10
        );
        
        $options = array_merge($defaults, $options);
        
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.publicationDate', 'DESC');
        
        $adapter = new DoctrineORMAdapter($queryBuilder->getQuery(), true);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setCurrentPage($options['page'], true, true);
        $pagerfanta->setMaxPerPage($options['maxPerPage']);
        
        return $pagerfanta;
    }
    
    public function getAllValid($options = array())
    {
        $defaults = array();
        
        $options = array_merge($defaults, $options);
        
        $queryBuilder = $this->createQueryBuilder('pv')
            ->select('pv');
        
        $query = $queryBuilder->getQuery();
        
        return $query->getResult();
	}
}
