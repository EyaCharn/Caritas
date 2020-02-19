<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity()
 */
class Theme
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
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "Name must be at least {{ limit }} characters long",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description ", type="string", length=2500)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 5,
     *      max = 2500,
     *      minMessage = "Discreption must be at least {{ limit }} characters long",
     *      maxMessage = "Discreption cannot be longer than {{ limit }} characters"
     * )
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


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get discreption
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

