<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('category', 'entity', array(
                    'class' => 'MGCAdminBundle:NewsCategory',
                    'required' => true,
                )
            )
            ->add('published', null, array(
                    'required' => false
                )
            )
            ->add('publicationDate', 'datetime', array(
                    'label' => 'Publication date',
                    'required' => true,
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd HH:mm'
                )
            );
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MGC\AdminBundle\Entity\News',
            'cascade_validation' => true,
        ));
    }
    
    public function getName()
    {
        return 'news';
    }
}