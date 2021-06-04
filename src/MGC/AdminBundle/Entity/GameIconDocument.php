<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use MGC\AdminBundle\Validator\Constraints as MyAssert;

use MGC\AdminBundle\Entity\Document;

/**
 * @ORM\Table(name="game_icon_document")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\GameIconDocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */

class GameIconDocument extends Document
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
     * @ORM\OneToOne(targetEntity="Game", inversedBy="icon")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;
    
    /**
     * @Assert\File(maxSize="150000", groups={"game"}, mimeTypes={
     *      "image/png",
     *      "image/jpg",
     *      "image/jpeg",
     *      "image/gif"
     * })
     * @MyAssert\MyImage(groups={"game"}, params={
     *      "maxWidth" = "20",
     *      "maxHeight" = "20"
     * })
     */
    protected $file;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;
    
    protected $dir = 'game_icons';
    
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
     * @return GameIconDocument
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
     * Set game
     *
     * @param \MGC\AdminBundle\Entity\Game $game
     * @return GameIconDocument
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
}
