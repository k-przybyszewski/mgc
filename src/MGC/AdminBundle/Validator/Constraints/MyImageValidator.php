<?php

namespace MGC\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MyImageValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }
        
        if ($value instanceof UploadedFile) {
            $image = getimagesize($value->getPathname());
            
            if($image !== false) {
                preg_match('/width=\"(.*)\" height=\"(.*)\"/', $image[3], $size);
                
                if(isset($constraint->params['maxWidth']) && isset($constraint->params['maxHeight'])) {
                    if($size[1] > $constraint->params['maxWidth'] || $size[2] > $constraint->params['maxHeight']) {
                        $this->context->addViolation($constraint->maxExceeded, array(
                                '%width%' => $constraint->params['maxWidth'],
                                '%height%' => $constraint->params['maxHeight']
                            )
                        );
                    }
                }
                
                if(isset($constraint->params['minWidth']) && isset($constraint->params['minHeight'])) {
                    if($size[1] < $constraint->params['minWidth'] || $size[2] < $constraint->params['minHeight']) {
                        $this->context->addViolation($constraint->minRequired, array(
                                '%width%' => $constraint->params['minWidth'],
                                '%height%' => $constraint->params['minHeight']
                            )
                        );
                    }
                }
            }
        }
    }
}