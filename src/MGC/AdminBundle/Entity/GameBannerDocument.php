<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use MGC\AdminBundle\Validator\Constraints as MyAssert;

use MGC\AdminBundle\Entity\Document;

/**
 * @ORM\Table(name="game_banner_document")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\GameBannerDocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */

class GameBannerDocument extends Document
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
     * @ORM\OneToOne(targetEntity="Game", inversedBy="banner")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;
    
    /**
     * @Assert\File(maxSize="15000000", groups={"popular_game"}, mimeTypes={
     *      "image/png",
     *      "image/jpg",
     *      "image/jpeg",
     *      "image/gif"
     * })
     * @MyAssert\MyImage(groups={"popular_game"}, params={
     *      "maxWidth" = "130",
     *      "maxHeight" = "75",
     *      "minWidth" = "130",
     *      "minHeight" = "75"
     * })
     * @Assert\NotBlank(message="Banner is required when game is popular!", groups={"popular_game"})
     */
    protected $file;
    
    protected $dir = 'game_banners';
    
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
     * Set game
     *
     * @param \MGC\AdminBundle\Entity\Game $game
     * @return GameBannerDocument
     */
    public function setGame(\MGC\AdminBundle\Entity\Game $game)
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
