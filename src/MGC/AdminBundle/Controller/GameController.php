<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MGC\AdminBundle\Form\Type\GameType;
use MGC\AdminBundle\Entity\Game;
use Symfony\Component\PropertyAccess\StringUtil;
use MGC\AdminBundle\Entity\GameCategory;
use MGC\AdminBundle\Form\Type\GameCategoryType;
use MGC\AdminBundle\Entity\GameIconDocument;
use MGC\AdminBundle\Entity\GameBannerDocument;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/game")
 */
class GameController extends Controller
{
    /**
     * @Route("/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_game_list")
     * @Template()
     */
    public function listAction($page = 1)
    {
    	$games = $this->getDoctrine()->getRepository('MGCAdminBundle:Game')
    		->getAllPaginate(array('page' => $page, 'maxPerPage' => 15));
    	
        return array(
            'games' => $games
        );
    }
    
    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"}, name="admin_game_edit")
     * @Route("/new/{game}", defaults={"game"= null}, requirements={"game" = "null"}, name="admin_game_new")
     * @Template()
     */
    public function gameAction(Game $game = null)
    {
    	$form = $this->createForm(new GameType(), $game);
    	$handler = $this->get('mgc.handlers.default');
    
    	if($handler->process($form)) {
    		return $this->redirect($this->generateUrl('admin_game_list'));
    	}
    	 
        return array(
            'form' => $form->createView(),
            'game' => ($game != null) ? $game : null,
        );
    }
    
    /**
     * @Route("/delete/icon/{icon}",  requirements={"icon" = "\d+"}, name="admin_game_remove_icon")
     * @Route("/delete/banner/{banner}", requirements={"banner" = "\d+"}, name="admin_game_remove_banner")
     */
    public function deleteGameFilesAction(Request $request, GameIconDocument $icon = null, GameBannerDocument $banner = null)
    {
        $em = $this->getDoctrine()->getManager();
        $referer = $request->headers->get('referer');
        
        if ($icon instanceof GameIconDocument) {
            $em->remove($icon);
            if (file_exists($icon->getAbsolutePath())) {
                unlink($icon->getAbsolutePath());
            }
        } elseif ($banner instanceof GameBannerDocument) {
            $banner->getGame()->setIsPopular(false);
            $em->remove($banner);
            if (file_exists($banner->getAbsolutePath())) {
                unlink($banner->getAbsolutePath());
            }
        }
        
        $em->flush();
        
        return $this->redirect($referer);
    }
    
    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_game_delete")
     */
    public function deleteServerAction(Game $game)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$em->remove($game);
    	$em->flush();
    	 
    	return $this->redirect($this->generateUrl('admin_game_list'));
    }
    
    /**
     * @Route("/categories/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_game_categories_list")
     * @Template()
     */
    public function categoriesAction($page = 1)
    {
        $categories = $this->getDoctrine()->getRepository('MGCAdminBundle:GameCategory')
        ->getAllPaginate(array('page' => $page, 'maxPerPage' => 10));
        
        return array(
            'categories' => $categories
        );
    }
    
    /**
     * @Route("/categories/edit/{id}", requirements={"id" = "\d+"}, name="admin_game_categories_edit")
     * @Route("/categories/new/{news}", defaults={"news"= null}, requirements={"news" = "null"}, name="admin_game_categories_new")
     * @Template()
     */
    public function categoryAction(GameCategory $game = null)
    {
        $form = $this->createForm(new GameCategoryType(), $game);
        $handler = $this->get('mgc.handlers.default');
    
        if($handler->process($form, true)) {
            return $this->redirect($this->generateUrl('admin_game_categories_list'));
        }
    
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/categories/delete/{id}", requirements={"id" = "\d+"}, name="admin_game_categories_delete")
     */
    public function categoryDeleteAction(GameCategory $game)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($game);
        $em->flush();
    
        return $this->redirect($this->generateUrl('admin_game_categories_list'));
    }
}
