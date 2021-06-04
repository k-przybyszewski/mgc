<?php

namespace MGC\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use MGC\AdminBundle\Entity\GameCategory;

class LoadGameCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
	{
	    $gameCategories = array(
	    	'FPS',
	        'MMORPG',
	        'RPG',
	        'FPP',
	        'Action',
	        'Cooperation',
	    );
	    
	    foreach ($gameCategories as $category) {
	        $gameCategory = new GameCategory();
	        $gameCategory->setName($category);
	        $manager->persist($gameCategory);
	    }
	    
	    $manager->flush();
	}
	
	public function getOrder()
	{
		return 3; // the order in which fixtures will be loaded
	}
}