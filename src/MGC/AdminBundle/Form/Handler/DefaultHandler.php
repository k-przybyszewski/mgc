<?php

namespace MGC\AdminBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class DefaultHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Symfony\Component\Form\Form
     */
    protected $form;

    /**
     * @param Request       $request
     * @param EntityManager $em
     */
    public function __construct(Request $request, EntityManager $em)
    {
        $this->request      = $request;
        $this->em           = $em;
    }

    /**
     * @param  Form $form
     * @throws \Exception
     * @return boolean
     */
    public function process(Form $form)
    {
        $this->form = $form;

        if (!($form instanceof Form)) {
            throw new \Exception(sprintf('Form was not provided for handler %s.', get_class($this)));
        }

        if ($this->request->getMethod() == 'POST') {
            $this->form->bind($this->request);
            
            if ($this->form->isValid()) {
            
            	$object = $this->form->getData();
            	
                $this->onSuccess($object);

                return true;
            } else {
//                 throw new \Exception($this->form->getErrorsAsString());
            }
        }

        return false;
    }

    protected function onSuccess($object)
    {
        $this->em->persist($object);
        $this->em->flush();
    }
}