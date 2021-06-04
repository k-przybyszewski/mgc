<?php

namespace MGC\PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use MGC\PortalBundle\Form\Type\CurrencyAndLanguageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MGC\AdminBundle\Entity\News;
use MGC\PortalBundle\Form\Type\ContactType;

class IndexController extends Controller
{
    /**
     * @Route("/{page}", defaults={"page" = 1}, requirements={"page" = "\d+"}, name="home_page")
     * @Template()
     */
    public function indexAction(Request $request, $page = 1)
    {
        $session = $this->get('session');

        $news = $this->getDoctrine()->getRepository('MGCAdminBundle:News')
            ->getAllPaginate(array(
                    'page' => $page,
                    'maxPerPage' => 5,
                    'forHomePage' => true
                )
            );

        return array(
            'news' => $news
        );
    }

    /**
     * @Route("/promo-banners", name="home_page_promo")
     * @Template()
     */
    public function promoAction()
    {
        $session = $this->get('session');

        $promos = $this->getDoctrine()->getRepository('MGCAdminBundle:Promo')
            ->getAllValid();

        return array(
            'promos' => $promos
        );
    }

    /**
     * @Template()
     */
    public function currencyAndLanguageAction(Request $request)
    {
    	$session = $this->get('session');
    	$form = $this->createForm(new CurrencyAndLanguageType($session, $this));

    	return array(
    	    'form' => $form->createView()
    	);
    }

    /**
     * @Route("/locale/{locale}", name="locale")
     */
    public function localeAction(Request $request, $locale)
    {
    	$session = $this->get('session');
    	$referer = $request->headers->get('referer');

    	$session->set('_locale', $locale);
    	$request->setLocale($locale);

    	return new RedirectResponse($referer);
    }

    /**
     * @Route("/currency/{currency}", name="currency")
     */
    public function currencyAction(Request $request, $currency)
    {
    	$session = $this->get('session');
    	$referer = $request->headers->get('referer');

    	$session->set('_currency', $currency);

    	return new RedirectResponse($referer);
    }

    /**
     * @Route("/news/read/{id}", requirements={"id" = "\d+"}, name="portal_news_read")
     * @Template()
     */
    public function newsReadAction(News $news)
    {
        return array(
            'news' => $news
        );
    }

    /**
     * Contact page.
     *
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        // if user is logged in - set default values
        $user = $this->getUser();
        if ($user != null) {
            $form->get('name')->setData(
                $user->getFirstName() . ' ' . $user->getLastName()
            );
            $form->get('email')->setData($user->getEmail());
        }

        // handle sent form
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $name = $data['name'];
            $email = $data['email'];
            $subject = $data['subject'];
            $messageContent = $data['message'];

            $mailer = $this->get('mgc.mailer');

            $mailer->sendFromContactForm(
                $name, $email, $subject, $messageContent
            );

            $session = $this->get('session');
            $translator = $this->get('translator');

            $session
                ->getFlashBag()
                ->add(
                    'notice',
                    $translator->trans('Your message has been sent.')
                );
        }

        return array(
            'form' => $form->createView()
        );
    }
}
