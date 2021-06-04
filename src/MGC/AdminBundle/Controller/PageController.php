<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MGC\AdminBundle\Entity\Page;
use MGC\AdminBundle\Form\Type\PageType;

/**
 * @Route("/page")
 */
class PageController extends Controller
{
    /**
     * @Route("/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_page_list")
     * @Template()
     */
    public function listAction($page = 1)
    {
        $pages = $this->getDoctrine()->getRepository('MGCAdminBundle:Page')
            ->getAllPaginate(array('page' => $page, 'maxPerPage' => 10));
        
        return array(
            'pages' => $pages,
            'enum' => Page::$choices
        );
    }
    
    /**
     * @Route("/edit/{id}/{locale}", requirements={"id" = "\d+"}, name="admin_page_edit")
     * @Route("/new/{page}", defaults={"page"= null}, requirements={"page" = "null"}, name="admin_page_new")
     * @Template()
     */
    public function pageAction(Page $page = null, $locale = 'en_US')
    {
        if($page === null) {
            $page = new Page();
        } else {
            $em = $this->getDoctrine()->getManager();
            
            $page->setTranslatableLocale($locale);
            $em->refresh($page);
        }
        
        $form = $this->createForm(new PageType(), $page);
        $handler = $this->get('mgc.handlers.default');
    
        if($handler->process($form)) {
            return $this->redirect($this->generateUrl('admin_page_list'));
        }
    
        return array(
            'form' => $form->createView(),
            'page' => $page
        );
    }
    
    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_page_delete")
     */
    public function deleteAction(Page $page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($page);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_page_list'));
    }
}
