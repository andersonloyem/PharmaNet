<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\HistoryRepository")
 */
class History
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateHisto", type="datetime", nullable=true)
     */
    private $dateHisto;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=64, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="typeHisto", type="string", length=64)
     */
    private $typeHisto;

    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="history")
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="history")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
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
     * Set dateHisto
     *
     * @param \DateTime $dateHisto
     *
     * @return History
     */
    public function setDateHisto($dateHisto)
    {
        $this->dateHisto = $dateHisto;

        return $this;
    }

    /**
     * Get dateHisto
     *
     * @return \DateTime
     */
    public function getDateHisto()
    {
        return $this->dateHisto;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return History
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

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return History
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set typeHisto
     *
     * @param string $typeHisto
     *
     * @return History
     */
    public function setTypeHisto($typeHisto)
    {
        $this->typeHisto = $typeHisto;

        return $this;
    }

    /**
     * Get typeHisto
     *
     * @return string
     */
    public function getTypeHisto()
    {
        return $this->typeHisto;
    }
}

