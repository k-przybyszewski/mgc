<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as Bridge;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\GameRepository")
 * @Assert\Callback(methods={"areCategoriesValid"}, groups={"game"})
 */
class Game
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(name="game_name", type="string", nullable=false, unique=true)
	 * @Assert\NotNull(message="Name required", groups={"game"})
	 */
	protected $name;
    
	/**
	 * @ORM\OneToMany(targetEntity="SlotPrice", mappedBy="game", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
	protected $slotPrices;
    
    /**
     * @ORM\Column(name="is_popular", type="boolean")
     */
    protected $isPopular = false;
    
    /**
     * @ORM\OneToOne(targetEntity="GameIconDocument", mappedBy="game", cascade={"persist", "remove"})
     */
    protected $icon;
    
    /**
     * @ORM\OneToOne(targetEntity="GameBannerDocument", mappedBy="game", cascade={"persist", "remove"})
     */
    protected $banner;
    
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
	
	/**
	 * @ORM\ManyToMany(targetEntity="GameCategory", inversedBy="games")
	 * @ORM\JoinTable(name="game_category_game")
	 * @Assert\NotBlank(message="Category required!", groups={"game"})
	 */
	private $categories;
	
	public function __construct()
	{
	    $this->categories = new ArrayCollection();
		$this->slotPrices = new ArrayCollection();
	}
	
	public function __toString()
	{
	    return $this->name;
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
     * @return Game
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Game
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
     * @return Game
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
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {

    }

    /**
     * Add slotPrices
     *
     * @param \MGC\AdminBundle\Entity\SlotPrice $slotPrices
     * @return Game
     */
    public function addSlotPrice(\MGC\AdminBundle\Entity\SlotPrice $slotPrices)
    {
        $slotPrices->setGame($this);
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

    /**
     * Set isPopular
     *
     * @param boolean $isPopular
     * @return Game
     */
    public function setIsPopular($isPopular)
    {
        $this->isPopular = $isPopular;
    
        return $this;
    }

    /**
     * Get isPopular
     *
     * @return boolean 
     */
    public function getIsPopular()
    {
        return $this->isPopular;
    }
    
    public function getBestPrice()
    {
        if(!count($this->getSlotPrices())) {
            return false;
        }
        
        $bestPrice = 10000000;
        foreach($this->getSlotPrices() as $slotPrice) {
            if($slotPrice->getPrice() < $bestPrice) {
                $bestPrice = $slotPrice->getPrice();
            }
        }
        
        return number_format($bestPrice, 2);
    }

    /**
     * Set icon
     *
     * @param \MGC\AdminBundle\Entity\GameIconDocument $icon
     * @return Game
     */
    public function setIcon(\MGC\AdminBundle\Entity\GameIconDocument $icon = null)
    {
        $icon->setGame($this);
        $this->icon = $icon;
    
        return $this;
    }

    /**
     * Get icon
     *
     * @return \MGC\AdminBundle\Entity\GameIconDocument 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set banner
     *
     * @param \MGC\AdminBundle\Entity\GameBannerDocument $banner
     * @return Game
     */
    public function setBanner(\MGC\AdminBundle\Entity\GameBannerDocument $banner = null)
    {
        $banner->setGame($this);
        $this->banner = $banner;
    
        return $this;
    }

    /**
     * Get banner
     *
     * @return \MGC\AdminBundle\Entity\GameBannerDocument 
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Add categories
     *
     * @param \MGC\AdminBundle\Entity\GameCategory $categories
     * @return Game
     */
    public function addCategory(\MGC\AdminBundle\Entity\GameCategory $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \MGC\AdminBundle\Entity\GameCategory $categories
     */
    public function removeCategory(\MGC\AdminBundle\Entity\GameCategory $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    public function areCategoriesValid(ExecutionContextInterface $context)
    {
        if (!$this->categories->count()) {
            $context->addViolationAt('categories', 'Category required!');
        }
    }
}
