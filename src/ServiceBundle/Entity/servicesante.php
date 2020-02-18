<?php

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * servicesante
 *
 * @ORM\Table(name="servicesante")
 * @ORM\Entity(repositoryClass="ServiceBundle\Repository\servicesanteRepository")
 */
class servicesante
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
     * @ORM\Column(name="specialite", type="string", length=255)
     */
    private $specialite;

    /**
     * @var int
     *
     * @ORM\Column(name="periode_dispo", type="integer")
     */
    private $periodeDispo;

    /**
     * @var string
     *
     * @ORM\Column(name="lettre_motiv", type="string", length=255)
     */
    private $lettreMotiv;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=3000)
     */
    private $commentaire;


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
     * Set specialite
     *
     * @param string $specialite
     *
     * @return servicesante
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set periodeDispo
     *
     * @param integer $periodeDispo
     *
     * @return servicesante
     */
    public function setPeriodeDispo($periodeDispo)
    {
        $this->periodeDispo = $periodeDispo;

        return $this;
    }

    /**
     * Get periodeDispo
     *
     * @return int
     */
    public function getPeriodeDispo()
    {
        return $this->periodeDispo;
    }

    /**
     * Set lettreMotiv
     *
     * @param string $lettreMotiv
     *
     * @return servicesante
     */
    public function setLettreMotiv($lettreMotiv)
    {
        $this->lettreMotiv = $lettreMotiv;

        return $this;
    }

    /**
     * Get lettreMotiv
     *
     * @return string
     */
    public function getLettreMotiv()
    {
        return $this->lettreMotiv;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return servicesante
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return servicesante
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
}

