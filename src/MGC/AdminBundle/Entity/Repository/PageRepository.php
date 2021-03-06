<?php

namespace MGC\AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Doctrine\ORM\Query\Expr\GroupBy;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
    public function getAllPaginate($options = array())
    {
        $defaults = array(
            'page' => 1,
            'maxPerPage' => 10,
            'forHomePage' => false
        );
        
        $options = array_merge($defaults, $options);
        
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p');
        
        $queryBuilder->orderBy('p.title', 'ASC');
        
        $adapter = new DoctrineORMAdapter($queryBuilder->getQuery(), true);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setCurrentPage($options['page'], true, true);
        $pagerfanta->setMaxPerPage($options['maxPerPage']);
        
        return $pagerfanta;
    }
    
    public function getLinkedPages($options = array())
    {
        $defaults = array(
            'position' => 'header'
        );
        
        $options = array_merge($defaults, $options);
        
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.linked = :linked')
            ->andWhere('p.position = :position')
            ->setParameter('position', $options['position'])
            ->setParameter('linked', true)
            ->orderBy('p.footerCategory, p.linkName', 'ASC');
        
        $query = $queryBuilder->getQuery();
        
        return $query->getResult();
    }
}
