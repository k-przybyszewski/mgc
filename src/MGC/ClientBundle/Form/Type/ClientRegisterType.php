<?php

namespace MGC\ClientBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, array(
                    'label' => 'Email address'
                )
            )
            ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'first_options' => array(
                        'label' => 'Password'
                    ),
                    'second_options' => array(
                        'label' => 'Repeat password'
                    ),
                    'invalid_message' => 'The passwords you entered did not match!',
                    'error_bubbling' => false
                )
            )
            ->add('captcha', 'captcha', array(
                    'length' => 6,
                    'width' => 200,
                    'quality' => 20,
                    'invalid_message' => 'Invalid image code.',
                    'label' => 'Image code',
                    'background_color' => array(255, 255, 255)
                )
            );
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'MGC\ClientBundle\Entity\ClientUser',
                'validation_groups' => array('registration')
            )
        );
    }
    
    public function getName()
    {
        return 'client_register';
    }
}