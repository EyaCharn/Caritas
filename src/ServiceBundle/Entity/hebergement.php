<?php

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * hebergement
 *
 * @ORM\Table(name="hebergement")
 * @ORM\Entity(repositoryClass="ServiceBundle\Repository\hebergementRepository")
 */
class hebergement
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
     * @ORM\Column(name="duree_max", type="integer")
     */
    private $dureeMax;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_places", type="integer")
     */
    private $nbPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="description_logement", type="string", length=3000)
     */
    private $descriptionLogement;

    /**
     * @var string
     *
     * @ORM\Column(name="reglement_interieur", type="string", length=3000)
     */
    private $reglementInterieur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Set dureeMax
     *
     * @param integer $dureeMax
     *
     * @return hebergement
     */
    public function setDureeMax($dureeMax)
    {
        $this->dureeMax = $dureeMax;

        return $this;
    }

    /**
     * Get dureeMax
     *
     * @return int
     */
    public function getDureeMax()
    {
        return $this->dureeMax;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return hebergement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     *
     * @return hebergement
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return int
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * Set descriptionLogement
     *
     * @param string $descriptionLogement
     *
     * @return hebergement
     */
    public function setDescriptionLogement($descriptionLogement)
    {
        $this->descriptionLogement = $descriptionLogement;

        return $this;
    }

    /**
     * Get descriptionLogement
     *
     * @return string
     */
    public function getDescriptionLogement()
    {
        return $this->descriptionLogement;
    }

    /**
     * Set reglementInterieur
     *
     * @param string $reglementInterieur
     *
     * @return hebergement
     */
    public function setReglementInterieur($reglementInterieur)
    {
        $this->reglementInterieur = $reglementInterieur;

        return $this;
    }

    /**
     * Get reglementInterieur
     *
     * @return string
     */
    public function getReglementInterieur()
    {
        return $this->reglementInterieur;
    }
}

