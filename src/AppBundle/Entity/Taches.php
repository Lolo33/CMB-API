<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taches
 *
 * @ORM\Table(name="taches")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TachesRepository")
 */
class Taches
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="fait", type="boolean")
     */
    private $fait;

    /**
     * @var UtilisateurApi
     *
     * @ORM\ManyToOne(targetEntity="UtilisateurApi")
     */
    private $utilisateur;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Taches
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
     * Set description
     *
     * @param string $description
     *
     * @return Taches
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
     * Set utilisateur
     *
     * @param \AppBundle\Entity\UtilisateurApi $utilisateur
     *
     * @return Taches
     */
    public function setUtilisateur(\AppBundle\Entity\UtilisateurApi $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\UtilisateurApi
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set fait
     *
     * @param boolean $fait
     *
     * @return Taches
     */
    public function setFait($fait)
    {
        $this->fait = $fait;

        return $this;
    }

    /**
     * Get fait
     *
     * @return boolean
     */
    public function getFait()
    {
        return $this->fait;
    }
}
