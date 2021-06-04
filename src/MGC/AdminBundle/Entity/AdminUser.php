<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MGC\AdminBundle\Entity\User;

/**
 * @ORM\Table(name="admin_user")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\AdminUserRepository")
 */
class AdminUser extends User
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
