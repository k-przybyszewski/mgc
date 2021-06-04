<?php
namespace MGC\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GameSortType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sortBy', 'choice', array(
                    'label' => 'Sort by',
                    'required' => false,
                    'empty_data' => false,
                    'data' => isset($options['data']->sortBy)? $options['data']->sortBy : 'name_asc',
                    'choices' => array(
                        'name_asc' => 'name (ascending)',
                        'name_desc' => 'name (descending)',
                        'price_asc' => 'price (ascending)',
                        'price_desc' => 'price (descending)'
                    )
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array(),
        ));
    }

    public function getName()
    {
        return 'game_sort';
    }
}
