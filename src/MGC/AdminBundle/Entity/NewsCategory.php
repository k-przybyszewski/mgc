<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="news_category")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\NewsCategoryRepository")
 */
class NewsCategory
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;
    
    /**
     * @ORM\OneToOne(targetEntity="NewsCategoryLogoDocument", mappedBy="category", cascade={"persist", "remove"})
     */
    private $logo;
    
    /**
	 * @ORM\OneToMany(targetEntity="News", mappedBy="category", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
    private $news;
    
    public function __construct()
    {
        $this->news = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getName();
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
     * @return NewsCategory
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
     * Add news
     *
     * @param \MGC\AdminBundle\Entity\News $news
     * @return NewsCategory
     */
    public function addNew(\MGC\AdminBundle\Entity\News $news)
    {
        $this->news[] = $news;
    
        return $this;
    }

    /**
     * Remove news
     *
     * @param \MGC\AdminBundle\Entity\News $news
     */
    public function removeNew(\MGC\AdminBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set logo
     *
     * @param \MGC\AdminBundle\Entity\NewsCategoryLogoDocument $logo
     * @return NewsCategory
     */
    public function setLogo(\MGC\AdminBundle\Entity\NewsCategoryLogoDocument $logo = null)
    {
        $logo->setCategory($this);
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return \MGC\AdminBundle\Entity\NewsCategoryLogoDocument 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Add news
     *
     * @param \MGC\AdminBundle\Entity\News $news
     * @return NewsCategory
     */
    public function addNews(\MGC\AdminBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \MGC\AdminBundle\Entity\News $news
     */
    public function removeNews(\MGC\AdminBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }
}
