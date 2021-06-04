<?php

namespace MGC\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MGC\AdminBundle\Entity\Game;
use MGC\PortalBundle\Form\Type\GameSortType;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

/**
 * @Route("/game-servers")
 */
class GameServersController extends Controller
{
    /**
     * @Route("/view/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="portal_game_servers_view")
     */
    public function viewAction(Request $request, $page = 1)
    {
        $session = $this->get('session');
        $sort = new \stdClass();
        
        // is Ajax
        if ($request->isXmlHttpRequest()) {
            $sortParams = trim($request->request->get('newSort', 'price_asc'));
            $session->set('game.sort', $sortParams);
            $sort->sortBy = $sortParams;
            
        } else {
            $sort->sortBy = $session->get('game.sort', 'price_asc');
        }
        
        $form = $this->createForm(new GameSortType(), $sort);
        
        $sortParams = explode('_', $sort->sortBy);
        
        $games = $this->getDoctrine()->getRepository('MGCAdminBundle:Game')
            ->getAllPaginate(array(
                    'page' => $page,
                    'maxPerPage' => 10,
                    'sort' => $sortParams[0],
                    'order' => strtoupper($sortParams[1]),
                )
            );
        // is Ajax
        if ($request->isXmlHttpRequest()) {
            return $this->render(
                'MGCPortalBundle:GameServers:table.html.twig',
                array(
                    'games' => $games,
                    'form' => $form->createView()
                )
            );
        } else {
            $populars = $this->getDoctrine()->getRepository('MGCAdminBundle:Game')
                ->getAllPaginate(array(
                        'popular' => true
                    )
                );
                
            return $this->render(
                'MGCPortalBundle:GameServers:view.html.twig',
                array(
                    'games' => $games,
                    'populars' => $populars,
                    'form' => $form->createView()
                )
            );
        }
    }
    
    public function renderOneAction(Game $game, $template = 'tr')
    {
        if ('tr' == $template) {
            return $this->render('MGCPortalBundle:GameServers:row.html.twig', array('game' => $game));
        } elseif ('box' == $template) {
            return $this->render('MGCPortalBundle:GameServers:box.html.twig', array('game' => $game));
        }
    }
    
    public function renderAction($games, $form)
    {
        return $this->render('MGCPortalBundle:GameServers:table.html.twig', array('games' => $games, 'form' => $form));
    }
}