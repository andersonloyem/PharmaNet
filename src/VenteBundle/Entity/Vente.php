<?php

namespace VenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vente
 *
 * @ORM\Table(name="vente")
 * @ORM\Entity(repositoryClass="VenteBundle\Repository\VenteRepository")
 */
class Vente
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
     * @ORM\Column(name="montantRegle", type="float", nullable=true)
     */
    private $montantRegle;
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string",  length=16,nullable=true)
     */
    private $etat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string",  length=16, nullable=true)
     */
    private $ref;
    
    /**
     * @var float
     *
     * @ORM\Column(name="reelPercu", type="float")
     */
    private $reelPercu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVente", type="datetime", nullable=true)
     */
    private $dateVente;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Malade", inversedBy="vente")
     * @ORM\JoinColumn(name="malade_id", referencedColumnName="id")
     */
    private $malade;

    /**
     * @ORM\OneToMany(targetEntity="produitVendu", mappedBy="vente")
     */
    private $produitVendu;
    
    public function __construct()
    {
        $this->produitVendu = new ArrayCollection();
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
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    public function getRef()
    {
        return $this->ref;
    }
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * Set montantRegle
     *
     * @param float $montantRegle
     *
     * @return Vente
     */
    public function setMontantRegle($montantRegle)
    {
        $this->montantRegle = $montantRegle;

        return $this;
    }

    /**
     * Get montantRegle
     *
     * @return float
     */
    public function getMontantRegle()
    {
        return $this->montantRegle;
    }

    /**
     * Set reelPercu
     *
     * @param float $reelPercu
     *
     * @return Vente
     */
    public function setReelPercu($reelPercu)
    {
        $this->reelPercu = $reelPercu;

        return $this;
    }

    /**
     * Get reelPercu
     *
     * @return float
     */
    public function getReelPercu()
    {
        return $this->reelPercu;
    }

    /**
     * Set dateVente
     *
     * @param \DateTime $dateVente
     *
     * @return Vente
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    /**
     * Get dateVente
     *
     * @return \DateTime
     */
    public function getDateVente()
    {
        return $this->dateVente;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Vente
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function setMalade($malade)
    {
        $this->malade = $malade;

        return $this;
    }

    public function getMalade()
    {
        return $this->malade;
    }
	
}

