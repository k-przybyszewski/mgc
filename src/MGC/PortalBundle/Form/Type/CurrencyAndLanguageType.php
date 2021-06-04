<?php

namespace MGC\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CurrencyAndLanguageType extends AbstractType
{
    public $session, $controller;
    
    public function __construct(Session $session, Controller $controller)
    {
        $this->session = $session;
        $this->controller = $controller;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('language', 'choice', array(
                    'label' => 'Select language',
                    'choices' => array(
                        $this->controller->generateUrl('locale', array('locale' => 'en_US')) => 'English',
                        $this->controller->generateUrl('locale', array('locale' => 'pl_PL')) => 'Polish'
                    ),
                    'attr' => array('class' => 'languageSelect'),
                    'data' => $this->controller->generateUrl('locale', array('locale' => $this->session->get('_locale', 'en_US'))),
                    'required' => false,
                    'empty_value' => false
                )
            )
            ->add('currency', 'choice', array(
                    'label' => 'Select currency',
                    'choices' => array(
                        $this->controller->generateUrl('currency', array('currency' => 'EUR')) => 'Euro (&euro;)',
                        $this->controller->generateUrl('currency', array('currency' => 'USD')) => 'US Dollar ($)',
                        $this->controller->generateUrl('currency', array('currency' => 'PLN')) => 'Polish Złoty (zł)',
                        $this->controller->generateUrl('currency', array('currency' => 'GBP')) => 'British Pound (&pound;)'
                    ),
                    'attr' => array('class' => 'currencySelect'),
                    'data' => $this->controller->generateUrl('currency', array('currency' => $this->session->get('_currency', 'EUR'))),
                    'required' => false,
                    'empty_value' => false
                )
            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array(),
        ));
    }

    public function getName()
    {
        return 'portal_settings';
    }
}
