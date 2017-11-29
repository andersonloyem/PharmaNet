<?php

namespace VenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Assureur
 *
 * @ORM\Table(name="assureur")
 * @ORM\Entity(repositoryClass="VenteBundle\Repository\AssureurRepository")
 */
class Assureur
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
     * @ORM\Column(name="nom", type="string", length=32, nullable=true, unique=true)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32)
     */
    private $telephone;

    /**
     * @var float
     *
     * @ORM\Column(name="taux", type="float", nullable=true)
     */
    private $taux;
    
    /**
     * @ORM\OneToMany(targetEntity="Malade", mappedBy="assureur")
     */
    private $malade;
    /**
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\CodePostal", inversedBy="assureur")
     * @ORM\JoinColumn(name="CodePostal_id", referencedColumnName="id")
     */
    private $codePostal;
    
    public function __construct()
    {
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Assureur
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
     * Set taux
     *
     * @param float $taux
     *
     * @return Assureur
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get taux
     *
     * @return float
     */
    public function getTaux()
    {
        return $this->taux;
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
}

