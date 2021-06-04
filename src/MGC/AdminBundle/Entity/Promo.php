<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="promo")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\PromoRepository")
 */
class Promo
{
    public static $themes = array(
        'grean' => 'Grean',
        'lime' => 'Lime',
        'orange' => 'Orange',
        'blue' => 'Blue'
    );
    
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="SlotPrice", inversedBy="promos")
	 * @ORM\JoinColumn(name="slot_price_id", referencedColumnName="id")
	 * @Assert\NotBlank(message="Price record required!")
	 */
	protected $slotPrice;
	
	/**
	 * @ORM\Column(name="remain_slots", type="integer")
	 * @Assert\NotBlank(message="Remain slots required!")
	 */
	protected $remainSlots;
	
	/**
	 * @ORM\Column(name="percent_discount", type="integer")
	 * @Assert\NotBlank(message="Discount required!")
	 */
	protected $discount;
	
	/**
	 * @ORM\Column(name="promo_text", type="text")
	 * @Assert\NotBlank(message="Promo text required!")
	 * @Gedmo\Translatable
	 */
	protected $promoText;
	
	/**
	 * @ORM\Column(type="string", columnDefinition="ENUM('grean', 'lime', 'orange', 'blue')")
	 */
	protected $theme;
	
	/**
	 * @ORM\Column(name="publication_date", type="datetime", nullable=false)
	 * @Assert\DateTime(message="Valid date is required")
	 */
	protected $publicationDate;
	
	/**
	 * @ORM\Column(name="close_date", type="datetime", nullable=false)
	 * @Assert\DateTime(message="Valid date is required")
	 */
	protected $closeDate;
	
	/**
	 * @ORM\Column(name="enabled", type="boolean")
	 */
	protected $enabled = true;

    /**
     * @ORM\OneToOne(targetEntity="PromoBannerDocument", mappedBy="promo", cascade={"persist", "remove"})
     */
	protected $banner;
	
	/**
	 * @ORM\Column(name="position_counter_top", type="integer", nullable=true)
	 */
	protected $positionCounterTop = 90;
	
	/**
	 * @ORM\Column(name="position_counter_left", type="integer", nullable=true)
	 */
	protected $positionCounterLeft = 295;
	
	/**
	 * @ORM\Column(name="position_text_top", type="integer", nullable=true)
	 */
	protected $positionTextTop = 170;
	
	/**
	 * @ORM\Column(name="position_text_left", type="integer", nullable=true)
	 */
	protected $positionTextLeft = 22;
	
	/**
	 * @Gedmo\Locale
	 */
	private $locale;
	
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
     * Set remainSlots
     *
     * @param integer $remainSlots
     * @return Promo
     */
    public function setRemainSlots($remainSlots)
    {
        $this->remainSlots = $remainSlots;
    
        return $this;
    }

    /**
     * Get remainSlots
     *
     * @return integer 
     */
    public function getRemainSlots()
    {
        return $this->remainSlots;
    }
    
    public function getRemainSlotsArray()
    {
        $slots = str_split($this->remainSlots);
        $count = count($slots);
        
        if($count < 3) {
            $result = array();
            
            for($x = 1; $x <= 3-$count; $x++) {
                $result[] = 0;
            }
            
            return array_merge($result, $slots);
        } else {
            return $slots;
        }
    }

    /**
     * Set discount
     *
     * @param integer $discount
     * @return Promo
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return integer 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set promoText
     *
     * @param string $promoText
     * @return Promo
     */
    public function setPromoText($promoText)
    {
        $this->promoText = $promoText;
    
        return $this;
    }

    /**
     * Get promoText
     *
     * @return string 
     */
    public function getPromoText()
    {
        return $this->promoText;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Promo
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    
        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set closeDate
     *
     * @param \DateTime $closeDate
     * @return Promo
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
    
        return $this;
    }

    /**
     * Get closeDate
     *
     * @return \DateTime 
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Set slotPrice
     *
     * @param \MGC\AdminBundle\Entity\SlotPrice $slotPrice
     * @return Promo
     */
    public function setSlotPrice(\MGC\AdminBundle\Entity\SlotPrice $slotPrice = null)
    {
        $this->slotPrice = $slotPrice;
    
        return $this;
    }

    /**
     * Get slotPrice
     *
     * @return \MGC\AdminBundle\Entity\SlotPrice 
     */
    public function getSlotPrice()
    {
        return $this->slotPrice;
    }
    
    public function getNewPrice()
    {
        return number_format($this->slotPrice->getPrice() * ((100 - $this->discount)/100), 2);
    }
    
    public function getStatus()
    {
        $now = new \DateTime();
        
        if(!$this->getEnabled()) {
            return 'Disabled';
        }
        
        if($now >= $this->getPublicationDate() && $now <= $this->getCloseDate()) {
            return 'Valid';
        } elseif($now < $this->getPublicationDate()) {
            return 'Ready';
        } elseif($now > $this->getCloseDate()) {
            return 'Outdated';
        }
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Promo
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set positionCounterTop
     *
     * @param integer $positionCounterTop
     * @return Promo
     */
    public function setPositionCounterTop($positionCounterTop)
    {
        $this->positionCounterTop = $positionCounterTop;
    
        return $this;
    }

    /**
     * Get positionCounterTop
     *
     * @return integer 
     */
    public function getPositionCounterTop()
    {
        return $this->positionCounterTop;
    }

    /**
     * Set positionCounterLeft
     *
     * @param integer $positionCounterLeft
     * @return Promo
     */
    public function setPositionCounterLeft($positionCounterLeft)
    {
        $this->positionCounterLeft = $positionCounterLeft;
    
        return $this;
    }

    /**
     * Get positionCounterLeft
     *
     * @return integer 
     */
    public function getPositionCounterLeft()
    {
        return $this->positionCounterLeft;
    }

    /**
     * Set positionTextTop
     *
     * @param integer $positionTextTop
     * @return Promo
     */
    public function setPositionTextTop($positionTextTop)
    {
        $this->positionTextTop = $positionTextTop;
    
        return $this;
    }

    /**
     * Get positionTextTop
     *
     * @return integer 
     */
    public function getPositionTextTop()
    {
        return $this->positionTextTop;
    }

    /**
     * Set positionTextLeft
     *
     * @param integer $positionTextLeft
     * @return Promo
     */
    public function setPositionTextLeft($positionTextLeft)
    {
        $this->positionTextLeft = $positionTextLeft;
    
        return $this;
    }

    /**
     * Get positionTextLeft
     *
     * @return integer 
     */
    public function getPositionTextLeft()
    {
        return $this->positionTextLeft;
    }

    /**
     * Set banner
     *
     * @param \MGC\AdminBundle\Entity\PromoBannerDocument $banner
     * @return Promo
     */
    public function setBanner(\MGC\AdminBundle\Entity\PromoBannerDocument $banner = null)
    {
        $banner->setPromo($this);
        $this->banner = $banner;
    
        return $this;
    }

    /**
     * Get banner
     *
     * @return \MGC\AdminBundle\Entity\PromoBannerDocument 
     */
    public function getBanner()
    {
        return $this->banner;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Promo
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
