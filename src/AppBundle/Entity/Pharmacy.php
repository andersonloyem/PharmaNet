<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pharmacy
 *
 * @ORM\Table(name="pharmacy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PharmacyRepository")
 */
class Pharmacy
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=64, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=728)
     */
    private $numero;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32)
     */
    private $telephone;
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=64)
     */
    private $adresse;
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=64)
     */
    private $logo;
    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=64)
     */
    private $slogan;

    /**
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\CodePostal", inversedBy="pharmacy")
     * @ORM\JoinColumn(name="CodePostal_id", referencedColumnName="id")
     */
    private $codePostal;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Pharmacy
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Pharmacy
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Pharmacy
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getSlogan()
    {
        return $this->slogan;
    }
}

