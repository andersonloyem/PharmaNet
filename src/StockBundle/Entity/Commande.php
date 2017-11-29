<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\Column(name="etape", type="string", length=16, nullable=true)
     */
    private $etape;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraison", type="datetime", nullable=true)
     */
    private $dateLivraison;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteCmd", type="integer", nullable=true)
     */
    private $quantiteCmd;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteLivre", type="integer", nullable=true)
     */
    private $quantiteLivre;

    /**
     * @var float
     *
     * @ORM\Column(name="montantHT", type="float", nullable=true)
     */
    private $montantHT;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

     /**
     * @ORM\ManyToOne(targetEntity="Fournisseur", inversedBy="commande")
     * @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="id")
     */
    private $fournisseur;


    /**
     * @ORM\OneToMany(targetEntity="ProduitCmd", mappedBy="commande")
     */
    private $produitCmd;

    public function __construct()
    {
        $this->produitCmd = new ArrayCollection();
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
     * Set etape
     *
     * @param string $etape
     *
     * @return Commande
     */
    public function setEtape($etape)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return string
     */
    public function getEtape()
    {
        return $this->etape;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Commande
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Commande
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * Set quantiteCmd
     *
     * @param integer $quantiteCmd
     *
     * @return Commande
     */
    public function setQuantiteCmd($quantiteCmd)
    {
        $this->quantiteCmd = $quantiteCmd;

        return $this;
    }

    /**
     * Get quantiteCmd
     *
     * @return int
     */
    public function getQuantiteCmd()
    {
        return $this->quantiteCmd;
    }

    /**
     * Set quantiteLivre
     *
     * @param integer $quantiteLivre
     *
     * @return Commande
     */
    public function setQuantiteLivre($quantiteLivre)
    {
        $this->quantiteLivre = $quantiteLivre;

        return $this;
    }

    /**
     * Get quantiteLivre
     *
     * @return int
     */
    public function getQuantiteLivre()
    {
        return $this->quantiteLivre;
    }

    /**
     * Set montantHT
     *
     * @param float $montantHT
     *
     * @return Commande
     */
    public function setMontantHT($montantHT)
    {
        $this->montantHT = $montantHT;

        return $this;
    }

    /**
     * Get montantHT
     *
     * @return float
     */
    public function getMontantHT()
    {
        return $this->montantHT;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Commande
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }
}

