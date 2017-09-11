<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanningTarif
 *
 * @ORM\Table(name="planning_tarif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlanningTarifRepository")
 */
class PlanningTarif
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
     * @ORM\ManyToOne(targetEntity="Terrain", inversedBy="listeTarifs")
     */
    private $terrain;

    /**
     * @var int
     *
     * @ORM\Column(name="tarif_montant", type="integer")
     */
    private $montant;

    /**
     * @var int
     *
     * @ORM\Column(name="tarif_jour", type="integer")
     */
    private $jourDeLaSemaine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tarif_heure_debut", type="time")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tarif_heure_fin", type="time")
     */
    private $heureFin;


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
     * Set terrain
     *
     * @param string $terrain
     *
     * @return PlanningTarif
     */
    public function setTerrain($terrain)
    {
        $this->terrain = $terrain;

        return $this;
    }

    /**
     * Get terrain
     *
     * @return string
     */
    public function getTerrain()
    {
        return $this->terrain;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return PlanningTarif
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return PlanningTarif
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return string
     */
    public function getHeureDebut()
    {
        return $this->heureDebut->format("H:i:s");
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return PlanningTarif
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return string
     */
    public function getHeureFin()
    {
        return $this->heureFin->format("H:i:s");
    }

    /**
     * Set jourDeLaSemaine
     *
     * @param integer $jourDeLaSemaine
     *
     * @return PlanningTarif
     */
    public function setJourDeLaSemaine($jourDeLaSemaine)
    {
        $this->jourDeLaSemaine = $jourDeLaSemaine;

        return $this;
    }

    /**
     * Get jourDeLaSemaine
     *
     * @return integer
     */
    public function getJourDeLaSemaine()
    {
        return $this->jourDeLaSemaine;
    }
}
