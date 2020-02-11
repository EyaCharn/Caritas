<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\evenementRepository")
 */
class evenement
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
     * @ORM\Column(name="NomEvenement", type="string", length=255)
     */
    private $nomEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="Theme", type="string", length=255)
     */
    private $theme;

    /**
     * @var int
     *
     * @ORM\Column(name="NbDeParticipants", type="integer")
     */
    private $nbDeParticipants;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;


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
     * Set nomEvenement
     *
     * @param string $nomEvenement
     *
     * @return evenement
     */
    public function setNomEvenement($nomEvenement)
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    /**
     * Get nomEvenement
     *
     * @return string
     */
    public function getNomEvenement()
    {
        return $this->nomEvenement;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return evenement
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set nbDeParticipants
     *
     * @param integer $nbDeParticipants
     *
     * @return evenement
     */
    public function setNbDeParticipants($nbDeParticipants)
    {
        $this->nbDeParticipants = $nbDeParticipants;

        return $this;
    }

    /**
     * Get nbDeParticipants
     *
     * @return int
     */
    public function getNbDeParticipants()
    {
        return $this->nbDeParticipants;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return evenement
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
}

