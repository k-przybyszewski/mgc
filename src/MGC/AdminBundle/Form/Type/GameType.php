<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use MGC\AdminBundle\Form\Type\SlotPriceType;
use Symfony\Component\Form\FormInterface;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', null, array(
                'label' => 'Game name'
            )
        )
        ->add('categories', 'entity', array(
                'class' => 'MGCAdminBundle:GameCategory',
                'required' => true,
                'multiple' => true
            )
        )
        ->add('slotPrices', 'collection', array(
                'by_reference' => false,
                'type' => new SlotPriceType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'error_bubbling' => false
            )
        )
        ->add('isPopular', 'checkbox', array(
                'label' => 'Is popular',
                'required' => false
            )
        )
        ->add('icon', new GameIconDocumentType())
        ->add('banner', new GameBannerDocumentType());
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MGC\AdminBundle\Entity\Game',
            'validation_groups' => function(FormInterface $form) {
                $vGroups = array('game');
                
                if($form->get('isPopular')->getData() === true) {
                    $vGroups[] = 'popular_game';
                    
                    return $vGroups;
                }
                
                return $vGroups;
            },
            'cascade_validation' => true
        ));
    }
    
    public function getName()
    {
        return 'game';
    }
}