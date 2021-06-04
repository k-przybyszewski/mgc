<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\PageRepository")
 */
class Page
{
    public static $choices = array(
        'position' => array(
            'header' => 'Header menu',
            'footer' => 'Footer menu'
        ),
        'footerCategory' => array(
            'about' => 'MaxGamedCloud',
            'popular_servers' => 'Most popular servers',
            'offer' => 'Offer'
        )
    );
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="Title required!")
     * @Gedmo\Translatable
     */
    private $title;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="Link name required!", groups={"linked"})
     * @Gedmo\Translatable
     */
    private $linkName;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Content required!")
     * @Gedmo\Translatable
     */
    private $content;
    
    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('header', 'footer')")
     */
    private $position;
    
    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('about', 'popular_servers', 'offer')")
     * @Assert\NotBlank(message="Footer category required!", groups={"page_footer"})
     */
    private $footerCategory;
    
    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    
    /**
     * @ORM\Column(name="is_linked", type="boolean")
     */
    private $linked = true;
    
    /**
     * @Gedmo\Locale
     */
    private $locale;
    
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Page
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set footerCategory
     *
     * @param string $footerCategory
     * @return Page
     */
    public function setFooterCategory($footerCategory)
    {
        $this->footerCategory = $footerCategory;

        return $this;
    }

    /**
     * Get footerCategory
     *
     * @return string 
     */
    public function getFooterCategory()
    {
        return $this->footerCategory;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Page
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
     * @return Page
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
     * Set linkName
     *
     * @param string $linkName
     * @return Page
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * Get linkName
     *
     * @return string 
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

    /**
     * Set linked
     *
     * @param boolean $linked
     * @return Page
     */
    public function setLinked($linked)
    {
        $this->linked = $linked;

        return $this;
    }

    /**
     * Get linked
     *
     * @return boolean 
     */
    public function getLinked()
    {
        return $this->linked;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
