<?php

namespace MGC\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\DBAL\Migrations\Tools\Console\Command\AbstractCommand;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\DoctrineCommandHelper;
use Symfony\Component\Console\Input\InputOption;
use Doctrine\Bundle\MigrationsBundle\Command\DoctrineCommand;

class MigrationStoreCommand extends AbstractCommand
{
	protected function configure()
	{
		parent::configure();
		
	    $this
	    	->setName('mgc:migrations:store')
	    	->addOption('em', null, InputOption::VALUE_OPTIONAL, 'The entity manager to use for this command.')
		    ->setDescription('Fill out database with existing migration version');
	}
	
	public function execute(InputInterface $input, OutputInterface $output)
	{
		DoctrineCommandHelper::setApplicationEntityManager($this->getApplication(), $input->getOption('em'));
		
        $configuration = $this->getMigrationConfiguration($input, $output);
        DoctrineCommand::configureMigrations($this->getApplication()->getKernel()->getContainer(), $configuration);
        
        $drop = 'DROP TABLE IF EXISTS '.$configuration->getMigrationsTableName();
        
        $configuration->getConnection()->executeQuery($drop);
        
        if ($migrations = $configuration->getMigrations()) {
            foreach ($migrations as $version) {
            	$version->markMigrated();
            	$output->writeln(sprintf('<comment>>></comment> Version <comment>%s</comment> stored in database.', $version));
            }
        }
	}
}