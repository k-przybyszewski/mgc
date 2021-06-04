<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsCategoryLogoDocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', null, array(
                'label' => 'Logo (85x85)'
            )
        );
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MGC\AdminBundle\Entity\NewsCategoryLogoDocument'
        ));
    }
    
    public function getName()
    {
        return 'category_logo';
    }
}