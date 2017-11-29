<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use VenteBundle\Entity\produitvendu;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="ean13", type="string", length=16)
     */
    private $ean13;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="noLot", type="integer")
     */
    private $noLot;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float")
     */
    private $tva;

    /**
     * @var int
     *
     * @ORM\Column(name="contenance", type="integer")
     */
    private $contenance;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;

    /**
     * @var int
     *
     * @ORM\Column(name="stockMax", type="integer", nullable=true)
     */
    private $stockMax;

    /**
     * @var int
     *
     * @ORM\Column(name="stockMin", type="integer", nullable=true)
     */
    private $stockMin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePeremption", type="datetime", nullable=true)
     */
    private $datePeremption;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="datetime", nullable=true)
     */
    private $dateCmd;

    /**
     * @var string
     *
     * @ORM\Column(name="generique", type="string", length=32)
     */
    private $generique;

    /**
     * @var int
     *
     * @ORM\Column(name="stockMag", type="integer", nullable=true)
     */
    private $stockMag;

    /**
     * @var float
     *
     * @ORM\Column(name="prixPublic", type="float", nullable=true)
     */
    private $prixPublic;

    /**
     * @var float
     *
     * @ORM\Column(name="prixAchat", type="float", nullable=true)
     */
    private $prixAchat;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=128)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produit")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Forme", inversedBy="produit")
     * @ORM\JoinColumn(name="forme_id", referencedColumnName="id")
     */
    private $forme;

    /**
     * @ORM\ManyToOne(targetEntity="Fabriquant", inversedBy="produit")
     * @ORM\JoinColumn(name="fabriquant_id", referencedColumnName="id")
     */
    private $fabriquant;

    /**
     * @ORM\ManyToOne(targetEntity="Rayon", inversedBy="produit")
     * @ORM\JoinColumn(name="rayon_id", referencedColumnName="id")
     */
    private $rayon;

    /**
     * @ORM\ManyToOne(targetEntity="Magasin", inversedBy="produit")
     * @ORM\JoinColumn(name="magasin_id", referencedColumnName="id")
     */
    private $magasin;

    /**
     * @ORM\ManyToOne(targetEntity="Unite", inversedBy="produit")
     * @ORM\JoinColumn(name="unite_id", referencedColumnName="id")
     */
    private $unite;

    /**
     * @ORM\OneToMany(targetEntity="ProduitCmd", mappedBy="produit")
     */
    private $produitCmd;

    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="produit")
     */
    private $history;
    /**
     * @ORM\OneToMany(targetEntity="VenteBundle\Entity\produitVendu", mappedBy="produit")
     */
    private $produitVendu;

    public function __construct()
    {
        $this->produitCmd = new ArrayCollection();
        $this->history = new ArrayCollection();
        $this->produitVendu = new ArrayCollection();
        $this->noLot = 0; $this->contenance = 0; $this->generique = null; $this->description = null;
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
     * Set ean13
     *
     * @param string $ean13
     *
     * @return Produit
     */
    public function setEan13($ean13)
    {
        $this->ean13 = $ean13;

        return $this;
    }

    /**
     * Get ean13
     *
     * @return string
     */
    public function getEan13()
    {
        return $this->ean13;
    }

     /**
     * Set cip
     *
     * @param string $cip
     *
     * @return Categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get cip
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function setFabriquant($fabriquant)
    {
        $this->fabriquant = $fabriquant;

        return $this;
    }

    public function getFabriquant()
    {
        return $this->fabriquant;
    }
    
    public function setForme($forme)
    {
        $this->forme = $forme;

        return $this;
    }

    public function getForme()
    {
        return $this->forme;
    }
    
    public function setMagasin($magasin)
    {
        $this->magasin = $magasin;

        return $this;
    }

    public function getMagasin()
    {
        return $this->magasin;
    }
    
    public function setRayon($rayon)
    {
        $this->rayon = $rayon;

        return $this;
    }

    public function getRayon()
    {
        return $this->rayon;
    }
    
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    public function getUnite()
    {
        return $this->unite;
    }
    public function setProduitVendu($produitVendu)
    {
        $this->produitVendu = $produitVendu;

        return $this;
    }

    public function getProduitVendu()
    {
        return $this->produitVendu;
    }
    
    public function setProduitCmd($produitCmd)
    {
        $this->produitCmd = $produitCmd;

        return $this;
    }

    public function getProduitCmd()
    {
        return $this->produitCmd;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produit
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
     * Set noLot
     *
     * @param integer $noLot
     *
     * @return Produit
     */
    public function setNoLot($noLot)
    {
        $this->noLot = $noLot;

        return $this;
    }

    /**
     * Get noLot
     *
     * @return int
     */
    public function getNoLot()
    {
        return $this->noLot;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Produit
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set contenance
     *
     * @param integer $contenance
     *
     * @return Produit
     */
    public function setContenance($contenance)
    {
        $this->contenance = $contenance;

        return $this;
    }

    /**
     * Get contenance
     *
     * @return int
     */
    public function getContenance()
    {
        return $this->contenance;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set stockMax
     *
     * @param integer $stockMax
     *
     * @return Produit
     */
    public function setStockMax($stockMax)
    {
        $this->stockMax = $stockMax;

        return $this;
    }

    /**
     * Get stockMax
     *
     * @return int
     */
    public function getStockMax()
    {
        return $this->stockMax;
    }

    /**
     * Set stockMin
     *
     * @param integer $stockMin
     *
     * @return Produit
     */
    public function setStockMin($stockMin)
    {
        $this->stockMin = $stockMin;

        return $this;
    }

    /**
     * Get stockMin
     *
     * @return int
     */
    public function getStockMin()
    {
        return $this->stockMin;
    }

    /**
     * Set datePeremption
     *
     * @param \DateTime $datePeremption
     *
     * @return Produit
     */
    public function setDatePeremption($datePeremption)
    {
        $this->datePeremption = $datePeremption;

        return $this;
    }

    /**
     * Get datePeremption
     *
     * @return \DateTime
     */
    public function getDatePeremption()
    {
        return $this->datePeremption;
    }

    /**
     * Set dateCmd
     *
     * @param \DateTime $dateCmd
     *
     * @return Produit
     */
    public function setDateCmd($dateCmd)
    {
        $this->dateCmd = $dateCmd;

        return $this;
    }

    /**
     * Get dateCmd
     *
     * @return \DateTime
     */
    public function getDateCmd()
    {
        return $this->dateCmd;
    }

    /**
     * Set generique
     *
     * @param string $generique
     *
     * @return Produit
     */
    public function setGenerique($generique)
    {
        $this->generique = $generique;

        return $this;
    }

    /**
     * Get generique
     *
     * @return string
     */
    public function getGenerique()
    {
        return $this->generique;
    }

    /**
     * Set stockMag
     *
     * @param integer $stockMag
     *
     * @return Produit
     */
    public function setStockMag($stockMag)
    {
        $this->stockMag = $stockMag;

        return $this;
    }

    /**
     * Get stockMag
     *
     * @return int
     */
    public function getStockMag()
    {
        return $this->stockMag;
    }

    /**
     * Set prixPublic
     *
     * @param float $prixPublic
     *
     * @return Produit
     */
    public function setPrixPublic($prixPublic)
    {
        $this->prixPublic = $prixPublic;

        return $this;
    }

    /**
     * Get prixPublic
     *
     * @return float
     */
    public function getPrixPublic()
    {
        return $this->prixPublic;
    }

    /**
     * Set prixAchat
     *
     * @param float $prixAchat
     *
     * @return Produit
     */
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * Get prixAchat
     *
     * @return float
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

