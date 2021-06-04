<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GameCategory
 *
 * @ORM\Table(name="game_category")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\GameCategoryRepository")
 */
class GameCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="Game", mappedBy="categories")
     */
    private $games;

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
     * @return GameCategory
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
     * Constructor
     */
    public function __construct()
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Add games
     *
     * @param \MGC\AdminBundle\Entity\Game $games
     * @return GameCategory
     */
    public function addGame(\MGC\AdminBundle\Entity\Game $games)
    {
        $this->games[] = $games;
    
        return $this;
    }

    /**
     * Remove games
     *
     * @param \MGC\AdminBundle\Entity\Game $games
     */
    public function removeGame(\MGC\AdminBundle\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }
}
