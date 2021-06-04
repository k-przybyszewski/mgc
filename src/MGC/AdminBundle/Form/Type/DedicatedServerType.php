<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DedicatedServerType extends AbstractType
{	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', null, array(
				'label' => 'Server name'
			)
		)->add('ipAddress', null, array(
				'label' => 'Server ip address'
			)
		)
		->add('city', null, array(
				'label' => 'City'
			)
		)
        ->add('country', 'entity',
            array(
                'property'      => 'name',
                'label'         => 'Country',
                'empty_value'   => '-- Select country --',
                'class'         => 'MGCAdminBundle:Country',
            )
        )
		->add('x', 'hidden')
		->add('y', 'hidden');
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'MGC\AdminBundle\Entity\DedicatedServer',
			'validation_groups' => array('server')
		));
	}
	
	public function getName()
	{
		return 'server';
	}
}