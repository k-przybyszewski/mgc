<?php

namespace MGC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * MGC\AdminBundle\Entity\Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="MGC\AdminBundle\Entity\Repository\CountryRepository")
 */
class Country implements Translatable
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotNull(message="Required")
     * @Gedmo\Translatable
     */
    private $name;

    /**
     * @var string $nationality
     *
     * @ORM\Column(name="nationality", type="string", length=255)
     * @Assert\NotNull(message="Required")
     * @Gedmo\Translatable
     */
    private $nationality;

    /**
     * @var string $iso
     *
     * @ORM\Column(name="iso", type="string", length=255, nullable=true)
     */
    private $iso;

    /**
     * @var string $iso3
     *
     * @ORM\Column(name="iso3", type="string", length=255, nullable=true)
     */
    private $iso3;

    /**
     * @var string $num_code
     *
     * @ORM\Column(name="num_code", type="string", length=255, nullable=true)
     */
    private $num_code;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;


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
     * @return Country
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
     * Set nationality
     *
     * @param string $nationality
     * @return Country
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set iso
     *
     * @param string $iso
     * @return Country
     */
    public function setIso($iso)
    {
        $this->iso = $iso;
    
        return $this;
    }

    /**
     * Get iso
     *
     * @return string 
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set iso3
     *
     * @param string $iso3
     * @return Country
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
    
        return $this;
    }

    /**
     * Get iso3
     *
     * @return string 
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set num_code
     *
     * @param string $numCode
     * @return Country
     */
    public function setNumCode($numCode)
    {
        $this->num_code = $numCode;
    
        return $this;
    }

    /**
     * Get num_code
     *
     * @return string 
     */
    public function getNumCode()
    {
        return $this->num_code;
    }
}
