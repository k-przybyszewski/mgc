<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as Bridge;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="dedicated_server")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\DedicatedServerRepository")
 */
class DedicatedServer
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(name="server_name", type="string", nullable=false)
	 * @Assert\NotNull(message="Name required", groups={"server"})
	 */
	protected $name;
	
	/**
	 * @ORM\Column(name="server_ip_address", type="string", nullable=false)
	 * @Assert\NotNull(message="Required", groups={"server"})
	 * @Assert\Ip(message="Incorrect IP address", groups={"server"})
	 */
	protected $ipAddress;
	
	/**
	 * @ORM\Column(type="string", nullable=false)
	 * @Assert\NotNull(message="City required", groups={"server"})
	 */
	protected $city;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Country")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
	 * @ORM\OrderBy({"name" = "DESC"})
	 * @Assert\NotNull(message="Country required", groups={"server"})
	 */
	protected $country;
	
	/**
	 * @ORM\Column(name="server_location_x", type="integer", nullable=false)
	 * @Assert\NotNull(message="Select location required (x)", groups={"server"})
	 */
	protected $x;
	
	/**
	 * @ORM\Column(name="server_location_y", type="integer", nullable=false)
	 * @Assert\NotNull(message="Select location required (y)", groups={"server"})
	 */
	protected $y;
	
	/**
	 * @ORM\OneToMany(targetEntity="SlotPrice", mappedBy="server", cascade={"persist", "remove"})
	 */
	protected $slotPrices;
	
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
	    $this->slotPrices = new ArrayCollection();
	}
	
	public function __toString()
	{
		return sprintf('%s (%s)', $this->name, $this->ipAddress);
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
     * Set name
     *
     * @param string $name
     * @return DedicatedServer
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return DedicatedServer
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return DedicatedServer
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
     * @return DedicatedServer
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

    /**
     * Set x
     *
     * @param integer $x
     * @return DedicatedServer
     */
    public function setX($x)
    {
        $this->x = $x;
    
        return $this;
    }

    /**
     * Get x
     *
     * @return integer 
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param integer $y
     * @return DedicatedServer
     */
    public function setY($y)
    {
        $this->y = $y;
    
        return $this;
    }

    /**
     * Get y
     *
     * @return integer 
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return DedicatedServer
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param \MGC\AdminBundle\Entity\Country $country
     * @return DedicatedServer
     */
    public function setCountry(\MGC\AdminBundle\Entity\Country $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \MGC\AdminBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add slotPrices
     *
     * @param \MGC\AdminBundle\Entity\SlotPrice $slotPrices
     * @return DedicatedServer
     */
    public function addSlotPrice(\MGC\AdminBundle\Entity\SlotPrice $slotPrices)
    {
        $slotPrices->setServer($this);
        $this->slotPrices[] = $slotPrices;
    
        return $this;
    }

    /**
     * Remove slotPrices
     *
     * @param \MGC\AdminBundle\Entity\SlotPrice $slotPrices
     */
    public function removeSlotPrice(\MGC\AdminBundle\Entity\SlotPrice $slotPrices)
    {
        $this->slotPrices->removeElement($slotPrices);
    }

    /**
     * Get slotPrices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlotPrices()
    {
        return $this->slotPrices;
    }
}
