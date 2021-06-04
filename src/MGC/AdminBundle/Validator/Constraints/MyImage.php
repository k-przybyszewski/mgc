<?php

namespace MGC\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MyImage extends Constraint
{
    public $params;
    public $maxExceeded = 'Maximum size of the image (%width%x%height%) exceeded.';
    public $minRequired = 'Minimum size of the image (%width%x%height%).';
}