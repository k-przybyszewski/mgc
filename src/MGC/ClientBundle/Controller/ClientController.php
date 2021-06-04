<?php

namespace MGC\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;
use MGC\AdminBundle\Form\Type\LoginType;
use MGC\ClientBundle\Form\Type\ClientRegisterType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ClientController extends Controller
{
    public function loginBoxAction(Request $request)
    {
        return $this->forward('MGCAdminBundle:Security:login', array('request' => $request, 'domain' => 'MGCClientBundle', 'template' => 'loginBox.html.twig'));
    }
    
    /**
     * @Route("/register", name="client_register")
     * @Template()
     */
    public function registerAction()
    {
        $session = $this->get('session');
        $translator = $this->get('translator');
        $form = $this->createForm(new ClientRegisterType());
        $handler = $this->get('mgc.handlers.registration');
        
        if($handler->process($form)) {
            $user = $form->getData();
            
            $this->get('session')
                ->getFlashBag()
                ->add('notice', $translator->trans('An email has been sent to <strong>%email%</strong>. It contains a link you must click to confirm registration', array('%email%' => $user->getEmail())));
        }
        
        return array(
            'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/register/confirm/{token}", name="client_registration_confirm_email")
     */
    public function confirmAction($token)
    {
        $router = $this->get('router');
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getEntityManager();
        
        $user = $userManager->findUserByConfirmationToken($token);
        
        if(null === $user) {
            return new RedirectResponse($router->generate('home_page'));
        }
        
        $user->setEnabled(true);
        $user->setConfirmationToken(null);
        $user->setRoles(array('ROLE_CLIENT'));
        
        $em->persist($user);
        $em->flush();
        
        $this->get('session')
            ->getFlashBag()
            ->add('notice', 'Your account has been activated. You can now login.');
        
        return new RedirectResponse($router->generate('client_login'));
    }
}
