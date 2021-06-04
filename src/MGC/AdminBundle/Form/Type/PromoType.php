<?php

namespace MGC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use MGC\AdminBundle\Form\Type\SlotPriceType;
use MGC\AdminBundle\Entity\Promo;

class PromoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slotPrice', null, array(
                    'label' => 'Game and server',
                    'required' => true
                )
            )
            ->add('remainSlots', null, array(
                    'label' => 'Slots in promo',
                    'required' => true
                )
            )
            ->add('discount', null, array(
                    'label' => 'Discount %',
                    'required' => true
                )
            )
            ->add('publicationDate', 'datetime', array(
                    'label' => 'Start date',
                    'required' => true,
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd HH:mm'
                )
            )
            ->add('closeDate', 'datetime', array(
                    'label' => 'End date',
                    'required' => true,
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd HH:mm'
                )
            )
            ->add('promoText', null, array(
                    'label' => 'Promotion text',
                    'required' => true
                )
            )
            ->add('theme', 'choice', array(
                    'label' => 'Counter theme',
                    'choices' => Promo::$themes,
                    'empty_value' => false
                )
            )
            ->add('banner', new PromoBannerDocumentType())
            ->add('positionCounterTop', 'hidden')
            ->add('positionCounterLeft', 'hidden')
            ->add('positionTextTop', 'hidden')
            ->add('positionTextLeft', 'hidden');;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'MGC\AdminBundle\Entity\Promo',
                'cascade_validation' => true
            )
        );
    }

    public function getName()
    {
        return 'promo';
    }
}