<?php

namespace VenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Malade
 *
 * @ORM\Table(name="malade")
 * @ORM\Entity(repositoryClass="VenteBundle\Repository\MaladeRepository")
 */
class Malade
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
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="modeReglement", type="string", length=32)
     */
    private $modeReglement;

    /**
     * @var float
     *
     * @ORM\Column(name="poid", type="float")
     */
    private $poid;

    /**
     * @var float
     *
     * @ORM\Column(name="taille", type="float")
     */
    private $taille;
    
    /**
     * @ORM\ManyToOne(targetEntity="Assureur", inversedBy="malade")
     * @ORM\JoinColumn(name="assureur_id", referencedColumnName="id")
     */
    private $assureur;
    
    /**
     * @ORM\OneToMany(targetEntity="Vente", mappedBy="malade")
     */
    private $vente;
    /**
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\CodePostal", inversedBy="malade")
     * @ORM\JoinColumn(name="CodePostal_id", referencedColumnName="id")
     */
    private $codePostal;
    
    public function __construct()
    {
        $this->vente = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Malade
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Malade
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
     * Set modeReglement
     *
     * @param string $modeReglement
     *
     * @return Malade
     */
    public function setModeReglement($modeReglement)
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    /**
     * Get modeReglement
     *
     * @return string
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * Set poid
     *
     * @param float $poid
     *
     * @return Malade
     */
    public function setPoid($poid)
    {
        $this->poid = $poid;

        return $this;
    }

    /**
     * Get poid
     *
     * @return float
     */
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set taille
     *
     * @param float $taille
     *
     * @return Malade
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return float
     */
    public function getTaille()
    {
        return $this->taille;
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
    public function setAssureur($assureur)
    {
        $this->assureur = $assureur;

        return $this;
    }

    public function getAssureur()
    {
        return $this->assureur;
    }
}

