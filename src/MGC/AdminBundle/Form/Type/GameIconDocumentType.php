<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GameIconDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', null, array(
                'label' => 'Icon (20x20)'
            )
        );
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MGC\AdminBundle\Entity\GameIconDocument',
            'validation_groups' => array('game')
        ));
    }
    
    public function getName()
    {
        return 'game_icon';
    }
}