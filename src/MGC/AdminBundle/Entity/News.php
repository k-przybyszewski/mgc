<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="title", type="string", nullable=false, unique=true)
     * @Assert\NotNull(message="Title required")
     * @Gedmo\Translatable
     */
    private $title;
    
    /**
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank(message="Content required!")
     * @Gedmo\Translatable
     */
    private $content;

    /**
     * @ORM\Column(name="publication_date", type="datetime", nullable=false)
     * @Assert\NotBlank(message="Publication date required!")
     * @Assert\DateTime(message="Valid date is required")
     */
    protected $publicationDate;

    /**
     * @ORM\Column(name="is_published", type="boolean")
     */
    protected $published = true;
    
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
	 * @ORM\ManyToOne(targetEntity="NewsCategory", inversedBy="news")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 * @Assert\NotBlank(message="Category required!")
	 */
    private $category;
    
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
     * Set title
     *
     * @param string $title
     * @return News
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
     * @return News
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
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return News
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
     * Set published
     *
     * @param boolean $published
     * @return News
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return News
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
     * @return News
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
     * Set category
     *
     * @param \MGC\AdminBundle\Entity\NewsCategory $category
     * @return News
     */
    public function setCategory(\MGC\AdminBundle\Entity\NewsCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \MGC\AdminBundle\Entity\NewsCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
