<?php

namespace MGC\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MGC\AdminBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="client_user")
 * @ORM\Entity(repositoryClass="MGC\ClientBundle\Entity\Repository\ClientUserRepository")
 */
class ClientUser extends User
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
