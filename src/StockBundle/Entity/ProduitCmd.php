<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitCmd
 *
 * @ORM\Table(name="produit_cmd")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\ProduitCmdRepository")
 */
class ProduitCmd
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
     * @var float
     *
     * @ORM\Column(name="prixTTC", type="float", nullable=true)
     */
    private $prixTTC;

    /**
     * @var float
     *
     * @ORM\Column(name="prixNet", type="float", nullable=true)
     */
    private $prixNet;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteCmd", type="integer", nullable=true)
     */
    private $quantiteCmd;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteRecu", type="integer", nullable=true)
     */
    private $quantiteRecu;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float")
     */
    private $tva;

    /**
     * @var float
     *
     * @ORM\Column(name="prixPublic", type="float", nullable=true)
     */
    private $prixPublic;

    /**
     * @var float
     *
     * @ORM\Column(name="prixNetRecu", type="float", nullable=true)
     */
    private $prixNetRecu;

    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="produitCmd")
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     */
    private $produit;

     /**
     * @ORM\ManyToOne(targetEntity="Commande", inversedBy="produitCmd")
     * @ORM\JoinColumn(name="commande_id", referencedColumnName="id")
     */
    private $commande;

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
     * Set prixTTC
     *
     * @param float $prixTTC
     *
     * @return ProduitCmd
     */
    public function setPrixTTC($prixTTC)
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    /**
     * Get prixTTC
     *
     * @return float
     */
    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    /**
     * Set prixNet
     *
     * @param float $prixNet
     *
     * @return ProduitCmd
     */
    public function setPrixNet($prixNet)
    {
        $this->prixNet = $prixNet;

        return $this;
    }

    /**
     * Get prixNet
     *
     * @return float
     */
    public function getPrixNet()
    {
        return $this->prixNet;
    }

    /**
     * Set quantiteCmd
     *
     * @param integer $quantiteCmd
     *
     * @return ProduitCmd
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
     * Set quantiteRecu
     *
     * @param integer $quantiteRecu
     *
     * @return ProduitCmd
     */
    public function setQuantiteRecu($quantiteRecu)
    {
        $this->quantiteRecu = $quantiteRecu;

        return $this;
    }

    /**
     * Get quantiteRecu
     *
     * @return int
     */
    public function getQuantiteRecu()
    {
        return $this->quantiteRecu;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return ProduitCmd
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
     * Set prixPublic
     *
     * @param float $prixPublic
     *
     * @return ProduitCmd
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
     * Set prixNetRecu
     *
     * @param float $prixNetRecu
     *
     * @return ProduitCmd
     */
    public function setPrixNetRecu($prixNetRecu)
    {
        $this->prixNetRecu = $prixNetRecu;

        return $this;
    }

    /**
     * Get prixNetRecu
     *
     * @return float
     */
    public function getPrixNetRecu()
    {
        return $this->prixNetRecu;
    }
    
    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    public function getCommande()
    {
        return $this->commande;
    }
}

