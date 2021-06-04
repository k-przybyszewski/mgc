<?php

namespace MGC\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Unique extends Constraint
{
    public $message;
    
    private $service = 'mgc.validator.unique';
    
    public $entity;
    
    public $property;
    
    public function validatedBy()
    {
        return $this->service;
    }
    
    public function requiredOptions()
    {
        return array('entity', 'property');
    }
    
    public function getTargets()
    {
        return Constraint::CLASS_CONSTRAINT;
    }
}