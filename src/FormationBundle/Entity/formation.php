<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="FormationBundle\Repository\formationRepository")
 */
class formation
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplaces", type="integer")
     */
    private $nbplaces;

    /**
     * @var string
     *
     * @ORM\Column(name="CV", type="string", length=255)
     */
    private $cV;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000)
     */
    private $description;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return formation
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return formation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return formation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return formation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set nbplaces
     *
     * @param integer $nbplaces
     *
     * @return formation
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * Get nbplaces
     *
     * @return int
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * Set cV
     *
     * @param string $cV
     *
     * @return formation
     */
    public function setCV($cV)
    {
        $this->cV = $cV;

        return $this;
    }

    /**
     * Get cV
     *
     * @return string
     */
    public function getCV()
    {
        return $this->cV;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return formation
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

