<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use MGC\AdminBundle\Entity\Page;
use Symfony\Component\Form\FormInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('linkName')
            ->add('linked', null, array(
                    'label' => 'Display in menu',
                    'required' => false
                )
            )
            ->add('position', 'choice', array(
                    'label' => 'Page position',
                    'choices' => Page::$choices['position'],
                    'empty_value' => false
                )
            )
            ->add('footerCategory', 'choice', array(
                    'label' => 'Footer category',
                    'choices' => Page::$choices['footerCategory'],
                    'empty_value' => '== Choose category =='
                )
            )
            ->add('content')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $vGroups = array('Default');
        $resolver->setDefaults(array(
            'data_class' => 'MGC\AdminBundle\Entity\Page',
            'validation_groups' => function(FormInterface $form) use ($vGroups) {
                if($form->get('position')->getData() == 'footer') {
                    $vGroups[] = 'page_footer';
                }
                if($form->get('linked')->getData() === true) {
                    $vGroups[] = 'linked';
                }
                
                return $vGroups;
            }
        ));
    }
    
    public function getName()
    {
        return 'page';
    }
}