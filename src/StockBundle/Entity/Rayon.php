<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Rayon
 *
 * @ORM\Table(name="rayon")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\RayonRepository")
 */
class Rayon
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
     * @ORM\Column(name="nom", type="string", length=32, nullable=true, unique=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="rayon")
     */
    private $produit;

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
     * @return Rayon
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
     * @return Rayon
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
}

