<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complexe
 *
 * @ORM\Table(name="complexe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComplexeRepository")
 */
class Complexe
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
     * @var Coordonnee
     *
     * @ORM\Column(name="lieu_nom", type="string")
     */
    private $nom;

    /**
     * @var Coordonnee
     *
     * @ORM\OneToOne(targetEntity="Coordonnee")
     */
    private $coordonnees;

    /**
     * @var Terrain[]
     *
     * @ORM\OneToMany(targetEntity="Terrain", mappedBy="complexe")
     */
    private $listeTerrains;

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
     * Constructor
     */
    public function __construct()
    {
        $this->lieuListeTerrains = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Complexe
     */
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

    /**
     * Set coordonnees
     *
     * @param \AppBundle\Entity\Coordonnee $coordonnees
     *
     * @return Complexe
     */
    public function setCoordonnees(\AppBundle\Entity\Coordonnee $coordonnees = null)
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }

    /**
     * Get coordonnees
     *
     * @return \AppBundle\Entity\Coordonnee
     */
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    /**
     * Add listeTerrain
     *
     * @param \AppBundle\Entity\Terrain $listeTerrain
     *
     * @return Complexe
     */
    public function addListeTerrain(\AppBundle\Entity\Terrain $listeTerrain)
    {
        $this->listeTerrains[] = $listeTerrain;

        return $this;
    }

    /**
     * Remove listeTerrain
     *
     * @param \AppBundle\Entity\Terrain $listeTerrain
     */
    public function removeListeTerrain(\AppBundle\Entity\Terrain $listeTerrain)
    {
        $this->listeTerrains->removeElement($listeTerrain);
    }

    /**
     * Get listeTerrains
     *
     * @return \AppBundle\Entity\Terrain[]
     */
    public function getListeTerrains()
    {
        return $this->listeTerrains;
    }
}
