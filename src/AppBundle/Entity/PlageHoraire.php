<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlageHoraire
 *
 * @ORM\Table(name="plage_horaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlageHoraireRepository")
 */
class PlageHoraire
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
     * @ORM\ManyToOne(targetEntity="Terrain", inversedBy="listeHoraires")
     */
    private $terrain;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hor_heure_debut", type="datetime")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hor_heure_fin", type="datetime")
     */
    private $heureFin;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="PlageHoraireStatut")
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Reservation", inversedBy="plageHoraire")
     */
    private $reservation;


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
     * @return PlageHoraire
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
     * Set heureDebut
     *
     * @param \DateTime $heureDebut
     *
     * @return PlageHoraire
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
        return $this->heureDebut->format("d-m-Y H:i:s");
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return PlageHoraire
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
        return $this->heureFin->format("d-m-Y H:i:s");
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return PlageHoraire
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set reservation
     *
     * @param string $reservation
     *
     * @return PlageHoraire
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return string
     */
    public function getReservation()
    {
        return $this->reservation;
    }
}

