<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
	public $options;
	
	public function __construct($options = array())
	{
		$this->options = $options;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('_username', null, array(
					'label' => 'Email address',
					'required' => true,
					'attr' => array(
						'value' => $this->options['last_username']
					)
				)
			)
			->add('_password', 'password', array(
					'label' => 'Password',
					'required' => true
				)
			)
// 			->add('_remember_me', 'checkbox', array(
// 					'label' => 'Remember me',
// 					'required' => false,
// 					'attr' => array(
// 						'value' => 'on'
// 					)
// 				)
// 			)
			->add('_csrf_token', 'hidden', array(
					'attr' => array(
						'value' => $this->options['csrf_token']
					)
				)
			);
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'validation_groups' => array(),
			'csrf_protection'   => false
		));
	}
	
	public function getName()
	{
		return '';
	}
}