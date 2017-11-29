<?php

namespace VenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use StockBundle\Entity\Produit;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * produitVendu
 *
 * @ORM\Table(name="produit_vendu")
 * @ORM\Entity(repositoryClass="VenteBundle\Repository\produitVenduRepository")
 */
class produitVendu
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
     * @var int
     *
     * @ORM\Column(name="qtiteVendu", type="integer", nullable=true)
     */
    private $qtiteVendu;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float", nullable=true)
     */
    private $tva;

    /**
     * @var float
     *
     * @ORM\Column(name="prixUnit", type="float", nullable=true)
     */
    private $prixUnit;

    /**
     * @var float
     *
     * @ORM\Column(name="montantTTC", type="float", nullable=true)
     */
    private $montantTTC;

    /**
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\Produit", inversedBy="produitVendu")
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     */
    private $produit;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vente", inversedBy="produitVendu")
     * @ORM\JoinColumn(name="vente_id", referencedColumnName="id")
     */
    private $vente;

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
     * Set qtiteVendu
     *
     * @param integer $qtiteVendu
     *
     * @return produitVendu
     */
    public function setQtiteVendu($qtiteVendu)
    {
        $this->qtiteVendu = $qtiteVendu;

        return $this;
    }

    /**
     * Get qtiteVendu
     *
     * @return int
     */
    public function getQtiteVendu()
    {
        return $this->qtiteVendu;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return produitVendu
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
     * Set prixUnit
     *
     * @param float $prixUnit
     *
     * @return produitVendu
     */
    public function setPrixUnit($prixUnit)
    {
        $this->prixUnit = $prixUnit;

        return $this;
    }

    /**
     * Get prixUnit
     *
     * @return float
     */
    public function getPrixUnit()
    {
        return $this->prixUnit;
    }

    /**
     * Set montantTTC
     *
     * @param float $montantTTC
     *
     * @return produitVendu
     */
    public function setMontantTTC($montantTTC)
    {
        $this->montantTTC = $montantTTC;

        return $this;
    }

    /**
     * Get montantTTC
     *
     * @return float
     */
    public function getMontantTTC()
    {
        return $this->montantTTC;
    }
    public function setVente($vente)
    {
        $this->vente = $vente;

        return $this;
    }

    public function getVente()
    {
        return $this->vente;
    }
}

