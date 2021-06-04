<?php

namespace MGC\ClientBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MGC\AdminBundle\Form\Handler\DefaultHandler;
use FOS\UserBundle\Util\TokenGenerator;
use MGC\AdminBundle\Mailer\Mailer;

class RegistrationHandler extends DefaultHandler
{
    private $tokenGenerator, $mailer;
    
    public function __construct(Request $request, EntityManager $em, TokenGenerator $tokenGenerator, Mailer $mailer)
    {
        $this->tokenGenerator = $tokenGenerator;
        $this->mailer = $mailer;
        
        parent::__construct($request, $em);
    }
    
    protected function onSuccess($user)
    {
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }
        
        $this->mailer->sendRegistrationEmail($user);
        
        $this->em->persist($user);
        $this->em->flush();
    }
}