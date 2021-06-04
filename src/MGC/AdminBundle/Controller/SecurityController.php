<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use MGC\AdminBundle\Form\Type\LoginType;

class SecurityController extends Controller
{
    public function loginAction(Request $request, $domain = 'FOSUserBundle', $template = 'login.html.twig')
    {
        $session = $this->container->get('session');
        
        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            $error = $error->getMessage();

            $username = (null === $session) ? null : $session->get(SecurityContext::LAST_USERNAME);
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
	        ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
	        : null;
        
        $form = $this->createForm(new LoginType(array(
        	'csrf_token'	=> $csrfToken,
        	'last_username' => $lastUsername
        )));
        
        return $this->container->get('templating')->renderResponse($domain . ':Security:' . $template, array(
            'error'         => $error,
        	'form'			=> $form->createView()
       ));
    }
    
    public function checkAction()
    {
    	throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }
    
    public function logoutAction()
    {
    	throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
