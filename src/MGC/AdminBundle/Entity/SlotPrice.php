<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="game_slot_price")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\SlotPriceRepository")
 */
class SlotPrice
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Game", inversedBy="slotPrice")
	 * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
	 * @Assert\NotNull(message="Game required", groups={"game"})
	 */
	protected $game;
	
	/**
	 * @ORM\ManyToOne(targetEntity="DedicatedServer")
	 * @ORM\JoinColumn(name="server_id", referencedColumnName="id")
	 * @Assert\NotNull(message="Server required", groups={"game"})
	 */
	protected $server;
	
	/**
	 * @ORM\Column(type="integer")
	 * @Assert\NotNull(message="Price required", groups={"game"})
	 */
	protected $price;
	
	/**
	 * @ORM\OneToMany(targetEntity="Promo", mappedBy="slotPrice", cascade={"persist", "remove"})
	 */
	protected $promos;

    public function __construct()
    {
        $this->promos = new ArrayCollection();
    }
	
	public function __toString()
	{
	    return $this->game->getName().' - '.$this->server->getName(). ' ('.$this->server->getIpAddress().') / '.$this->price.' €';
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
     * Set game
     *
     * @param \MGC\AdminBundle\Entity\Game $game
     * @return SlotPrice
     */
    public function setGame(\MGC\AdminBundle\Entity\Game $game = null)
    {
        $this->game = $game;
    
        return $this;
    }

    /**
     * Get game
     *
     * @return \MGC\AdminBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set server
     *
     * @param \MGC\AdminBundle\Entity\DedicatedServer $server
     * @return SlotPrice
     */
    public function setServer(\MGC\AdminBundle\Entity\DedicatedServer $server = null)
    {
        $this->server = $server;
    
        return $this;
    }

    /**
     * Get server
     *
     * @return \MGC\AdminBundle\Entity\DedicatedServer 
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return SlotPrice
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add promos
     *
     * @param \MGC\AdminBundle\Entity\Promo $promos
     * @return SlotPrice
     */
    public function addPromo(\MGC\AdminBundle\Entity\Promo $promos)
    {
        $this->promos[] = $promos;
    
        return $this;
    }

    /**
     * Remove promos
     *
     * @param \MGC\AdminBundle\Entity\Promo $promos
     */
    public function removePromo(\MGC\AdminBundle\Entity\Promo $promos)
    {
        $this->promos->removeElement($promos);
    }

    /**
     * Get promos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromos()
    {
        return $this->promos;
    }
}
