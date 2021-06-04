<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SlotPriceType extends AbstractType
{	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('server', 'entity', array(
					'label' => 'Server',
					'class' => 'MGCAdminBundle:DedicatedServer'
				)
			)
			->add('price');
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'MGC\AdminBundle\Entity\SlotPrice',
		));
	}
	
	public function getName()
	{
		return 'slot_price';
	}
}