<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanningComission
 *
 * @ORM\Table(name="planning_commission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlanningCommissionRepository")
 */
class PlanningComission
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
     * @ORM\ManyToOne(targetEntity="Terrain", inversedBy="listeComissions")
     */
    private $terrain;

    /**
     * @var UtilisateurApi
     *
     * @ORM\ManyToOne(targetEntity="UtilisateurApi", inversedBy="listeComissions")
     */
    private $utilisateurApi;

    /**
     * @var int
     *
     * @ORM\Column(name="com_montant", type="integer")
     */
    private $montant;

    /**
     * @var int
     *
     * @ORM\Column(name="com_jour", type="integer")
     */
    private $jourDeLaSemaine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_heure_debut", type="time")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_heure_fin", type="time")
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
     * @return PlanningComission
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
     * @param int $montant
     *
     * @return PlanningComission
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set heureDebut
     *
     * @param \DateTime $heureDebut
     *
     * @return PlanningComission
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
     * @return PlanningComission
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
     * @return PlanningComission
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

    /**
     * Set utilisateurApi
     *
     * @param \AppBundle\Entity\UtilisateurApi $utilisateurApi
     *
     * @return PlanningComission
     */
    public function setUtilisateurApi(\AppBundle\Entity\UtilisateurApi $utilisateurApi = null)
    {
        $this->utilisateurApi = $utilisateurApi;

        return $this;
    }

    /**
     * Get utilisateurApi
     *
     * @return \AppBundle\Entity\UtilisateurApi
     */
    public function getUtilisateurApi()
    {
        return $this->utilisateurApi;
    }
}
