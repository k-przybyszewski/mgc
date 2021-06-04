<?php

namespace MGC\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MGC\AdminBundle\Entity\Page;

/**
 * @Route("/page")
 */
class PageController extends Controller
{
    /**
     * @Template()
     */
    public function menuAction($position = 'header')
    {
        $session = $this->get('session');
        
        $pages = $this->getDoctrine()
            ->getRepository('MGCAdminBundle:Page')
            ->getLinkedPages(array(
                    'position' => $position
                )
            );
        
        return $this->render('MGCPortalBundle:Page:' . $position .'Menu.html.twig', array(
                'pages' => $pages
            )
        );
    }
    
    /**
     * @Route("/{slug}", name="portal_page_view")
     * @Template()
     */
    public function viewAction(Page $page = null)
    {
        if(!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }
        
        return array(
            'page' => $page
        );
    }
}