<?php

namespace MGC\AdminBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use MGC\AdminBundle\Validator\Constraints as MyAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Table(name="fos_user")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({  "admin_user" = "AdminUser",
 *                          "client_user" = "\MGC\ClientBundle\Entity\ClientUser",
 *                          "fos_user" = "User"
 * })
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @MyAssert\Unique(
 *      entity="MGCAdminBundle:User", 
 *      property="email",
 *      message = "Some client with this email address already exist in the system!",
 *      groups = {"registration"})
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(name="first_name", type="string", nullable=true)
	 */
	private $firstName;

	/**
	 * @ORM\Column(name="last_name", type="string", nullable=true)
	 */
	private $lastName;
	
	/**
	 * @Assert\NotBlank(message = "Email required!", groups = {"registration"})
	 * @Assert\Email(
	 *     message = "Invalid email address!",
	 *     checkMX = true,
	 *     groups = {"registration"}
	 * )
	 */
	protected $email;
	
	/**
	 * @Assert\NotBlank(message = "Password required!", groups = {"registration"})
	 */
	protected $plainPassword;
	
	/**
	 * @var datetime $created
	 *
	 * @ORM\Column(type="datetime")
	 * @Gedmo\Timestampable(on="create")
	 */
	private $createdAt;
	
	/**
	 * @var datetime $updated
	 *
	 * @ORM\Column(type="datetime")
	 * @Gedmo\Timestampable(on="update")
	 */
	private $updatedAt;

	public function __construct()
	{
		parent::__construct();
		// your own logic
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        $this->username = $email;
    }
}
