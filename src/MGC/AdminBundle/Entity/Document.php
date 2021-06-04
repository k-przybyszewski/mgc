<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Table(name="document")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({  "document" = "Document",
                            "game_icon" = "\MGC\AdminBundle\Entity\GameIconDocument",
                            "game_banner" = "\MGC\AdminBundle\Entity\GameBannerDocument",
                            "promo_banner" = "\MGC\AdminBundle\Entity\PromoBannerDocument",
                            "news_category_logo" = "\MGC\AdminBundle\Entity\NewsCategoryLogoDocument"
                        })
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\DocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Assert\File(maxSize="15000000")
     */
    protected $file;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;
    
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timestamp;
    
    protected $dir = 'documents';
    
    private $oldAbsolutePath;

    public function __toString()
    {
        if($r = $this->getWebPath()) {
            return $r;
        } else {
            return '';
        }
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
     * Set path
     *
     * @param string $path
     * @return Document
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Document
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
     * @return Document
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if($this->oldAbsolutePath !== null && $this->file !== null && file_exists($this->oldAbsolutePath)) {
            unlink($this->oldAbsolutePath);
        }
        
        if (null !== $this->file) {
            $extension  = pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename   = str_replace('.' . $extension, '', $this->file->getClientOriginalName());
            $this->setPath(sprintf('%s_%s.%s', $filename, uniqid(), $extension));
        }
    }
    
    /**
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
    
        $this->file->move($this->getUploadRootDir(), $this->path);
    
        unset($this->file);
    }
    
    /**
     * @ORM\PostLoad()
     */
    public function reloadTimestamp()
    {
        $this->oldAbsolutePath = $this->getAbsolutePath();
        $this->timestamp = \time();
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }
    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    
    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
    
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return '/uploads/'.$this->dir;
    }
    
    /**
     * Get file
     */
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     * @return Document
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
