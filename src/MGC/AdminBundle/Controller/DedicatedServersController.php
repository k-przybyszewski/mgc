<?php

namespace MGC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MGC\AdminBundle\Entity\DedicatedServer;
use MGC\AdminBundle\Form\Type\DedicatedServerType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/dedicated-servers")
 */
class DedicatedServersController extends Controller
{
	/**
	 * @Route("/view-map")
	 * @Template()
	 */
	public function viewMapAction()
	{
		$worldMap = file_get_contents($this->get('kernel')->getBundle('MGCAdminBundle')->getPath().'/Resources/config/worldMap.json');
		
		$sLocations = $this->getDoctrine()->getRepository('MGCAdminBundle:DedicatedServer')
            ->getForMap();
		 
		return array(
				'sLocations' => $sLocations,
				'map' => json_decode($worldMap, true)
		);
	}
	
    /**
     * @Route("/list/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="admin_dedicated_servers")
     * @Template()
     */
    public function listAction($page = 1)
    {
    	$doctrine = $this->getDoctrine();
    	$servers = $doctrine->getRepository('MGCAdminBundle:DedicatedServer')
    					->getAllPaginate(array('page' => $page, 'maxPerPage' => 15));
    	
        return array(
            'servers' => $servers
        );
    }
    
    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"}, name="admin_dedicated_server_edit")
     * @Route("/new/{server}", defaults={"server"= null}, requirements={"server" = "null"}, name="admin_dedicated_server_new")
     * @Template()
     */
    public function serverAction(Request $request, DedicatedServer $server = null)
    {
    	$form = $this->createForm(new DedicatedServerType(), $server);
    	$handler = $this->get('mgc.handlers.default');

    	if($handler->process($form)) {
    		return $this->redirect($this->generateUrl('admin_dedicated_servers'));
    	}
    	
    	return array(
    		'form' => $form->createView()
    	);
    }
    
    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_dedicated_server_delete")
     */
    public function deleteServerAction(DedicatedServer $server)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$em->remove($server);
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl('admin_dedicated_servers'));
    }
}
