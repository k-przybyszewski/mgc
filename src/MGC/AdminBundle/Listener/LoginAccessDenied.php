<?php

namespace MGC\AdminBundle\Listener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use MGC\ClientBundle\Entity\ClientUser;
use MGC\AdminBundle\Entity\AdminUser;

class LoginAccessDenied implements AccessDeniedHandlerInterface
{
    /** @var SecutityContext */
    private $context;
    
    /** @var Symfony\Component\DependencyInjection\ContainerInterface */
    private $container;
    
    private $request;
    
    public function __construct(ContainerInterface $container, SecurityContext $context)
    {
        $this->container = $container;
        $this->context = $context;
        $this->request = $container->get('request');
    }
    
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $user       = $this->context->getToken()->getUser();
        $router     = $this->container->get('router');
        $session    = $this->container->get('session');
        $translator = $this->container->get('translator');
        
        $session->invalidate();
        $this->container->get("security.context")->setToken(null);
        
        switch ($user) {
            case $user instanceof ClientUser:
                $route = 'client_login';
            break;
            case $user instanceof AdminUser:
                $route = 'admin_login';
            break;
        }
        
        return new RedirectResponse($router->generate($route));
    }
}