<?php

namespace MGC\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;

class UniqueValidator extends ConstraintValidator
{
    private $em;
    
    private $constraint;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function validate($value, Constraint $constraint)
    {
        $this->constraint = $constraint;
        
        $user = $this->em->getRepository($constraint->entity)
                    ->findOneBy(array(
                            $constraint->property => $this->getPropertyValue($value)
                        )
                    );
                    
        if($user) {
            $this->context->addViolationAt($constraint->property, $constraint->message, array(), null);
        }
    }
    
    private function getPropertyValue($value)
    {
        switch ($this->constraint->property) {
            case 'email':
                return $value->getEmail();
                break;
        }
    }
}