<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use MGC\AdminBundle\Validator\Constraints as MyAssert;

use MGC\AdminBundle\Entity\Document;

/**
 * @ORM\Table(name="promo_banner_document")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\PromoBannerDocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */

class PromoBannerDocument extends Document
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
     * @ORM\OneToOne(targetEntity="Promo", inversedBy="banner")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
     */
    private $promo;
    
    /**
     * @Assert\File(maxSize="15000000", mimeTypes={
     *      "image/png",
     *      "image/jpg",
     *      "image/jpeg",
     *      "image/gif"
     * })
     * @MyAssert\MyImage(params={
     *      "maxWidth" = "1002",
     *      "maxHeight" = "275",
     *      "minWidth" = "1002",
     *      "minHeight" = "275"
     * });
     */
    protected $file;
    
    protected $dir = 'promo_banners';
    
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
     * Set promo
     *
     * @param \MGC\AdminBundle\Entity\Promo $promo
     * @return PromoBannerDocument
     */
    public function setPromo(\MGC\AdminBundle\Entity\Promo $promo)
    {
        $this->promo = $promo;
    
        return $this;
    }

    /**
     * Get promo
     *
     * @return \MGC\AdminBundle\Entity\Promo 
     */
    public function getPromo()
    {
        return $this->promo;
    }
}
