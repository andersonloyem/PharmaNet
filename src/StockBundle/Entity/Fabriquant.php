<?php
namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fabriquant
 *
 * @ORM\Table(name="fabriquant")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\FabriquantRepository")
 */
class Fabriquant
{

    /**
     *
     * @var int @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string @ORM\Column(name="code", type="string", length=16, nullable=true, unique=true)
     */
    private $code;

    /**
     *
     * @var string @ORM\Column(name="nom", type="string", length=32, nullable=true, unique=true)
     */
    private $nom;

    /**
     *
     * @var string @ORM\Column(name="adresse", type="string", length=32)
     */
    private $adresse;

    /**
     *
     * @var string @ORM\Column(name="telephone", type="string", length=32)
     */
    private $telephone;

    /**
     *
     * @var string @ORM\Column(name="email", type="string", length=32)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="CodePostal", inversedBy="fabriquant")
     * @ORM\JoinColumn(name="CodePostal_id", referencedColumnName="id")
     */
    private $codePostal;

    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="fabriquant")
     */
    private $produit;

    /**
     *
     * @return the $produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $produit            
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    public function __construct()
    {
        $this->produit = new ArrayCollection();
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
     * @return Fabriquant
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
     * @return Fabriquant
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
     * Set adresse
     *
     * @param string $adresse            
     *
     * @return Fabriquant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone            
     *
     * @return Fabriquant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email            
     *
     * @return Fabriquant
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
        
        return $this;
    }

    public function getCodePostal()
    {
        return $this->codePostal;
    }
}

