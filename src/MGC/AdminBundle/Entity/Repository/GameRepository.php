<?php
namespace MGC\AdminBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends EntityRepository
{

    public function getAllPaginate($options = array())
    {
        $defaults = array(
            'page' => 1,
            'maxPerPage' => 10,
            'popular' => false,
            'sort' => 'price',
            'order' => 'ASC'
        );
        
        $options = array_merge($defaults, $options);
        
        $queryBuilder = $this->createQueryBuilder('g')->select('g');
        
        if ($options['popular']) {
            $queryBuilder->join('g.slotPrices', 'sp')
                ->where('g.isPopular = :popular')
                ->orderBy('g.name', 'ASC')
                ->setMaxResults(7)
                ->setParameter('popular', $options['popular']);
            
            return $queryBuilder->getQuery()->getResult();
        }
        
        if('price' == $options['sort']) {
            $queryBuilder
                ->addSelect('CASE WHEN (MIN(sp.price) != 0) THEN 1 ELSE 0 END AS HIDDEN isnull')
                ->addSelect('MIN(sp.price) AS HIDDEN price')
                ->leftJoin('g.slotPrices', 'sp')
                ->groupBy('g.id')
                ->orderBy('isnull', 'DESC')
                ->addOrderBy((('price' == $options['sort'])? '' : 'g.').$options['sort'], $options['order']);
        } else {
            $queryBuilder
                ->orderBy('g.'.$options['sort'], $options['order']);
        }
        
        $adapter = new DoctrineORMAdapter($queryBuilder->getQuery(), true);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setCurrentPage($options['page'], true, true);
        $pagerfanta->setMaxPerPage($options['maxPerPage']);
        
        return $pagerfanta;
    }
}