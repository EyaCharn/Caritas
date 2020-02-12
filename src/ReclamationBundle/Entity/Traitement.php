<?php

namespace ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traitement
 *
 * @ORM\Table(name="traitement")
 * @ORM\Entity(repositoryClass="ReclamationBundle\Repository\TraitementRepository")
 */
class Traitement
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
     * @ORM\Column(name="datetraitement", type="date")
     */
    private $datetraitement;

    /**
     * @var string
     *
     * @ORM\Column(name="rating", type="string", length=255)
     */
    private $rating;
    /**
     * @ORM\ManyToOne(targetEntity="Reclamation")
     * @ORM\JoinColumn(name="idrec",referencedColumnName="id")
     */
    private $idrec;

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
     * Set idrec
     *
     * @param integer $idrec
     *
     * @return Traitement
     */
    public function setIdrec($idrec)
    {
        $this->idrec = $idrec;

        return $this;
    }

    /**
     * Get idrec
     *
     * @return int
     */
    public function getIdrec()
    {
        return $this->idrec;
    }

    /**
     * Set datetraitement
     *
     * @param \DateTime $datetraitement
     *
     * @return Traitement
     */
    public function setDatetraitement($datetraitement)
    {
        $this->datetraitement = $datetraitement;

        return $this;
    }

    /**
     * Get datetraitement
     *
     * @return \DateTime
     */
    public function getDatetraitement()
    {
        return $this->datetraitement;
    }

    /**
     * Set rating
     *
     * @param string $rating
     *
     * @return Traitement
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }
}
