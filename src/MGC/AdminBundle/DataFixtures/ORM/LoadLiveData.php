<?php

namespace MGC\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use MGC\AdminBundle\Entity\User;
use MGC\AdminBundle\Entity\AdminUser;
use MGC\ClientBundle\Entity\ClientUser;

class LoadLiveData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
	{
		$userAdmin = new AdminUser();
		$userAdmin->setUsername('admin');
		$userAdmin->setPlainPassword('admin');
		$userAdmin->setEmail('admin@gmail.com');
		$userAdmin->setFirstName('Krzysztof');
		$userAdmin->setLastName('Przybyszewski');
		$userAdmin->setEnabled(true);
		$userAdmin->setLocked(false);
		$userAdmin->setRoles(array('ROLE_ADMIN'));
		$manager->persist($userAdmin);
		
		$userClient = new ClientUser();
		$userClient->setUsername('client');
		$userClient->setPlainPassword('client');
		$userClient->setEmail('client@gmail.com');
		$userClient->setFirstName('Dawid');
		$userClient->setLastName('Brzeczyszczykiewicz');
		$userClient->setEnabled(true);
		$userClient->setLocked(false);
		$userClient->setRoles(array('ROLE_CLIENT'));
		$manager->persist($userClient);
		
		$manager->flush();
	}
	
	public function getOrder()
	{
		return 2; // the order in which fixtures will be loaded
	}
}