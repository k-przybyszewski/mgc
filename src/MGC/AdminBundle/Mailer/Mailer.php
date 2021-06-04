<?php

namespace MGC\AdminBundle\Mailer;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

use Symfony\Component\Validator\Constraints\Email;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class Mailer extends ContainerAware
{
    /** @var \Symfony\Bundle\DoctrineBundle\Registry */
    private $doctrine;

    /** @var \Swift_Mailer */
    private $mailer;

    /** @var \Symfony\Bundle\FrameworkBundle\Routing\Router */
    private $router;

    /** @var \Symfony\Component\HttpFoundation\Request */
    private $request;

    private $message;

    private $templating;

    public function __construct(Registry $doctrine, \Swift_Mailer $mailer, Router $router, EngineInterface $templating)
    {
        $this->doctrine = $doctrine;
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;

        $this->em  = $this->doctrine->getEntityManager();

        $this->message = \Swift_Message::newInstance();
        $this->message->setFrom('noreply@mgc24.com');
    }

    public function sendResettingEmail(UserInterface $user)
    {
        $url = $this->router->generate('client_resetting_reset', array('token' => $user->getConfirmationToken()), true);
        $rendered = $this->templating->render('MGCClientBundle:Resetting:email.txt.twig', array(
                'user' => $user,
                'confirmationUrl' => $url
        ));

        $this->message->setSubject('MGC24.com | Password Resetting')
            ->setTo($user->getEmail())
            ->setBody($rendered);

        $this->sendEmail();
    }

    public function sendRegistrationEmail(UserInterface $user)
    {
        $url = $this->router->generate('client_registration_confirm_email', array('token' => $user->getConfirmationToken()), true);

        $rendered = $this->templating->render('MGCClientBundle:Emails:register.html.twig', array(
                'user' => $user,
                'confirmationUrl' => $url
        ));

        $this->message->setSubject('MGC24.com | Email confirmation')
            ->setTo($user->getEmail())
            ->setBody($rendered);

        $this->sendEmail();
    }

    /**
     * Send message from contact form.
     */
    public function sendFromContactForm($name, $email, $subject, $messageContent)
    {
        $message = $this->templating->render(
            'MGCPortalBundle:Emails:contact.html.twig',
            array(
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $messageContent
            )
        );

        $this->message
            ->setFrom($email)
            ->setReplyTo($email)
            ->setSubject('MGC24.com | ' . $subject)
            ->setTo($this->container->getParameter('admin_email'))
            ->setBody($message);

        $this->sendEmail();
    }

    private function sendEmail()
    {
        $this->mailer->send($this->message);
    }
}