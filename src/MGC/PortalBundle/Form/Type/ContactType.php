<?php
namespace MGC\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ContactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Your name'
            ))
            ->add('email', 'email', array(
                'label' => 'Your e-mail'
            ))
            ->add('subject', 'text', array(
                'label' => 'Subject'
            ))
            ->add('message', 'textarea', array(
                'label' => 'Message',
                'attr' => array(
                    'rows' => 15
                )
            ))
            ->add('captcha', 'captcha', array(
                'length' => 6,
                'width' => 200,
                'quality' => 20,
                'invalid_message' => 'Invalid image code.',
                'label' => 'Image code',
                'background_color' => array(255, 255, 255)
            ))
            ->add('submit', 'submit', array(
                'label' => 'Send'
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $constraints = new Collection(array(
            'name' => array(
                new NotBlank(array('message' => 'Name should not be blank.'))
            ),
            'email' => array(
                new NotBlank(array('message' => 'E-mail should not be blank.')),
                new Email(array('message' => 'Invalid e-mail address.'))
            ),
            'subject' => array(
                new NotBlank(array('message' => 'Subject should not be blank.'))
            ),
            'message' => array(
                new NotBlank(array('message' => 'Message should not be blank.'))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $constraints
        ));
    }

    public function getName()
    {
        return 'contact';
    }
}
