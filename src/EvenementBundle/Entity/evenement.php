<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "Name must be at least {{ limit }} characters long",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nomEvenement;

    /**
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumn(name="id_theme",referencedColumnName="id")
     */
    private $id_theme;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\Image
     */
    private $image;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2500)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      max = 2500,
     *      minMessage = "Description must be at least {{ limit }} characters long",
     *      maxMessage = "Description cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;



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
     * @Assert\Date
     * @Assert\Range(
     *      min = "now",
     *      max = "+366 days"
     * )
     */
    private $date;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function setTheme($id_theme)
    {
        $this->id_theme = $id_theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->id_theme;
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

