<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CodePostal
 *
 * @ORM\Table(name="code_postal")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\CodePostalRepository")
 */
class CodePostal
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
     * @ORM\Column(name="code", type="string", length=16, nullable=true, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="codePostal")
     * @ORM\JoinColumn(name="Ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity="Fabriquant", mappedBy="codePostal")
     */
    private $fabriquant;

     /**
     * @ORM\OneToMany(targetEntity="Fournisseur", mappedBy="codePostal")
     */
    private $fournisseur;
    
    /**
     * @ORM\OneToMany(targetEntity="VenteBundle\Entity\Malade", mappedBy="codePostal")
     */
    private $malade;
    /**
     * @ORM\OneToMany(targetEntity="VenteBundle\Entity\Assureur", mappedBy="codePostal")
     */
    private $assureur;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Pharmacy", mappedBy="codePostal")
     */
    private $pharmacy;

    public function __construct()
    {
        $this->frabriquant = new ArrayCollection();
        $this->fournisseur = new ArrayCollection();
        $this->assureur = new ArrayCollection();
        $this->malade = new ArrayCollection();
    }

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
     * Set code
     *
     * @param string $code
     *
     * @return CodePostal
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return CodePostal
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

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }
}

