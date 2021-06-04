<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MGC\AdminBundle\Entity\News;
use MGC\AdminBundle\Form\Type\NewsType;
use MGC\AdminBundle\Entity\NewsCategory;
use MGC\AdminBundle\Form\Type\NewsCategoryType;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
    /**
     * @Route("/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_news_list")
     * @Template()
     */
    public function listAction($page = 1)
    {
        $news = $this->getDoctrine()->getRepository('MGCAdminBundle:News')
            ->getAllPaginate(array('page' => $page, 'maxPerPage' => 10));
        
        return array(
            'news' => $news
        );
    }
    
    /**
     * @Route("/edit/{id}/{locale}", requirements={"id" = "\d+"}, name="admin_news_edit")
     * @Route("/new/{news}", defaults={"news" = null}, requirements={"news" = "null"}, name="admin_news_new")
     * @Template()
     */
    public function newsAction(News $news = null, $locale = 'en_US')
    {
        if($news !== null) {
            $em = $this->getDoctrine()->getManager();
            
            $news->setTranslatableLocale($locale);
            $em->refresh($news);
        }
        
        $form = $this->createForm(new NewsType(), $news);
        $handler = $this->get('mgc.handlers.default');
    
        if($handler->process($form)) {
            return $this->redirect($this->generateUrl('admin_news_list'));
        }
    
        return array(
            'form' => $form->createView(),
            'news' => $news
        );
    }

    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_news_delete")
     */
    public function deleteNewsAction(News $news)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($news);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_news_list'));
    }
    
    /**
     * @Route("/categories/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_categories_list")
     * @Template()
     */
    public function categoriesAction($page = 1)
    {
        $categories = $this->getDoctrine()->getRepository('MGCAdminBundle:NewsCategory')
            ->getAllPaginate(array('page' => $page, 'maxPerPage' => 10));
        
        return array(
            'categories' => $categories
        );
    }
    
    /**
     * @Route("/categories/edit/{id}", requirements={"id" = "\d+"}, name="admin_categories_edit")
     * @Route("/categories/new/{news}", defaults={"news"= null}, requirements={"news" = "null"}, name="admin_categories_new")
     * @Template()
     */
    public function categoryAction(NewsCategory $news = null)
    {
        $form = $this->createForm(new NewsCategoryType(), $news);
        $handler = $this->get('mgc.handlers.default');
    
        if($handler->process($form, true)) {
            return $this->redirect($this->generateUrl('admin_categories_list'));
        }
    
        return array(
            'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/categories/delete/{id}", requirements={"id" = "\d+"}, name="admin_categories_delete")
     */
    public function categoryDeleteAction(NewsCategory $news)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($news);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_categories_list'));
    }
}
