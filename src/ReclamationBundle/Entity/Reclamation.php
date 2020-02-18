<?php

namespace ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="ReclamationBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="claimdate", type="date")
     */
    private $claimdate;

    /**
     * @var string
     *
     * @ORM\Column(name="userclaimed", type="string", length=255)
     */
    private $userclaimed;

    /**
     * @var string
     *
     * @ORM\Column(name="userclaimer", type="string", length=255)
     */
    private $userclaimer;
    /**
     * @var string
     *
     * @ORM\Column(name="etatrec", type="string", length=255)
     */
    private $etatrec;




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
     * Set description
     *
     * @param string $description
     *
     * @return Reclamation
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
     * Set claimdate
     *
     * @param \DateTime $claimdate
     *
     * @return Reclamation
     */
    public function setClaimdate($claimdate)
    {
        $this->claimdate = $claimdate;

        return $this;
    }

    /**
     * Get claimdate
     *
     * @return \DateTime
     */
    public function getClaimdate()
    {
        return $this->claimdate;
    }

    /**
     * Set userclaimed
     *
     * @param string $userclaimed
     *
     * @return Reclamation
     */
    public function setUserclaimed($userclaimed)
    {
        $this->userclaimed = $userclaimed;

        return $this;
    }

    /**
     * Get userclaimed
     *
     * @return string
     */
    public function getUserclaimed()
    {
        return $this->userclaimed;
    }

    /**
     * Set userclaimer
     *
     * @param string $userclaimer
     *
     * @return Reclamation
     */
    public function setUserclaimer($userclaimer)
    {
        $this->userclaimer = $userclaimer;

        return $this;
    }

    /**
     * Get userclaimer
     *
     * @return string
     */
    public function getUserclaimer()
    {
        return $this->userclaimer;
    }
    public function __construct()
    {
        $this->date = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getEtatrec()
    {
        return $this->etatrec;
    }

    /**
     * @param string $etatrec
     */
    public function setEtatrec($etatrec)
    {
        $this->etatrec = $etatrec;
    }
    public function __toString()
    {
        return 'La valeur que tuv eux afficher';
    }
}

