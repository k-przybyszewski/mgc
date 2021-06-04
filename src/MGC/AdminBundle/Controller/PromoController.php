<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MGC\AdminBundle\Entity\Promo;
use MGC\AdminBundle\Form\Type\PromoType;

/**
 * @Route("/promo")
 */
class PromoController extends Controller
{
    /**
     * @Route("/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_promo_list")
     * @Template()
     */
    public function listAction($page)
    {
        $doctrine = $this->getDoctrine();
        
        $promos = $doctrine->getRepository('MGCAdminBundle:Promo')
            ->getAllPaginate(array('page' => $page));
        
        return array(
            'promos' => $promos
        );
    }
    
    
    /**
     * @Route("/edit/{id}/{locale}", requirements={"id" = "\d+"}, name="admin_promo_edit")
     * @Route("/new/{game}", defaults={"game"= null}, requirements={"game" = "null"}, name="admin_promo_new")
     * @Template()
     */
    public function promoAction(Promo $promo = null, $locale = 'en_US')
    {
        if($promo !== null) {
            $em = $this->getDoctrine()->getManager();
            
            $promo->setTranslatableLocale($locale);
            $em->refresh($promo);
        }
        
        $form = $this->createForm(new PromoType(), $promo);
        $handler = $this->get('mgc.handlers.default');
    
        if($handler->process($form, true)) {
            return $this->redirect($this->generateUrl('admin_promo_list'));
        }
    
        return array(
            'form' => $form->createView(),
            'promo' => $promo
        );
    }
    
    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_promo_delete")
     */
    public function deletePromoAction(Promo $promo)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($promo);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_promo_list'));
    }
    
    /**
     * @Route("/switch/{id}/{enabled}", requirements={"id" = "\d+"}, name="admin_promo_switch")
     */
    public function switchPromoAction(Promo $promo, $enabled = true)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $promo->setEnabled($enabled);
        
        $em->persist($promo);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_promo_list'));
    }
    
    /**
     * @Template()
     */
    public function renderAction(Promo $promo)
    {
        return array(
            'promo' => $promo
        );
    }
}
