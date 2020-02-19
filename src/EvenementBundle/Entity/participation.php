<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\participationRepository")
 */
class participation
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
     * @ORM\ManyToOne(targetEntity="evenement")
     * @ORM\JoinColumn(name="idEvent",referencedColumnName="id")
     */
    private $idEvent;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="idUtilisateur",referencedColumnName="id")
     */
    private $idUtilisateur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }


    public function getIdEvent()
    {
        return $this->idEvent;
    }


    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}

