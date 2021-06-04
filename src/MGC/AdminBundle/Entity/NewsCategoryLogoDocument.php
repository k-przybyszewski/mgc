<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use MGC\AdminBundle\Validator\Constraints as MyAssert;

use MGC\AdminBundle\Entity\Document;

/**
 * @ORM\Table(name="news_category_logo_document")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\NewsCategoryLogoDocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */

class NewsCategoryLogoDocument extends Document
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="NewsCategory", inversedBy="logo")
     * @ORM\JoinColumn(name="news_category_id", referencedColumnName="id")
     */
    private $category;
    
    /**
     * @Assert\File(maxSize="15000000", mimeTypes={
     *      "image/png",
     *      "image/jpg",
     *      "image/jpeg",
     *      "image/gif"
     * })
     * @Assert\NotBlank(message="Logo required!")
     * @MyAssert\MyImage(params={
     *      "maxWidth" = "85",
     *      "maxHeight" = "85",
     *      "minWidth" = "85",
     *      "minHeight" = "85"
     * })
     */
    protected $file;
    
    protected $dir = 'news_category_logos';
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

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
     * Set path
     *
     * @param string $path
     * @return GameBannerDocument
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set category
     *
     * @param \MGC\AdminBundle\Entity\NewsCategory $category
     * @return NewsCategoryLogoDocument
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
}
