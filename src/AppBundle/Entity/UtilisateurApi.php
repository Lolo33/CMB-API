<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * UtilisateurApiRepository
 *
 * @ORM\Table(name="utilisateur_api")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurApiRepository")
 */
class UtilisateurApi implements UserInterface
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
     * @ORM\Column(name="user_nom_societe", type="string")
     */
    private $nomSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="user_client_id", type="string", unique=true)
     */
    private $userClientId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=255)
     */
    private $userPassword;

    /**
     * @var Coordonnee
     *
     * @ORM\OneToOne(targetEntity="Coordonnee")
     */
    private $coordonnee;

    /**
     * @var PlanningComission
     *
     * @ORM\OneToMany(targetEntity="PlanningComission", mappedBy="apiUser")
     */
    private $listeComissions;

    /**
     * @var Reservation
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="utilisateurApi")
     */
    private $listeReservations;

    /**
     * @var string
     *
     * @ORM\Column(name="user_is_admin", type="boolean")
     */
    private $isAdmin;

    private $userPlainPassword;


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
     * Set userClientId
     *
     * @param string $userClientId
     *
     * @return UtilisateurApi
     */
    public function setUserClientId($userClientId)
    {
        $this->userClientId = $userClientId;

        return $this;
    }

    /**
     * Get userClientId
     *
     * @return string
     */
    public function getUserClientId()
    {
        return $this->userClientId;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     *
     * @return UtilisateurApi
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function getPassword()
    {
        return $this->getUserPassword();
    }

    /**
     * Set userPlainPassword
     *
     * @param string $userPlainPassword
     *
     * @return UtilisateurApi
     */
    public function setUserPlainPassword($userPlainPassword)
    {
        $this->userPlainPassword = $userPlainPassword;

        return $this;
    }

    /**
     * Get userPlainPassword
     *
     * @return string
     */
    public function getUserPlainPassword()
    {
        return $this->userPlainPassword;
    }

    public function getRoles()
    {
        return [];
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->getUserClientId();
    }

    public function eraseCredentials()
    {
        // Suppression des données sensibles
        $this->plainPassword = null;
    }

    /**
     * Set coordonnee
     *
     * @param \AppBundle\Entity\Coordonnee $coordonnee
     *
     * @return UtilisateurApi
     */
    public function setAdresse(\AppBundle\Entity\Coordonnee $coordonnee = null)
    {
        $this->coordonnee = $coordonnee;

        return $this;
    }

    /**
     * Get coordonnee
     *
     * @return \AppBundle\Entity\Coordonnee
     */
    public function getAdresse()
    {
        return $this->coordonnee;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listeComissions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set coordonnee
     *
     * @param \AppBundle\Entity\Coordonnee $coordonnee
     *
     * @return UtilisateurApi
     */
    public function setCoordonnee(\AppBundle\Entity\Coordonnee $coordonnee = null)
    {
        $this->coordonnee = $coordonnee;

        return $this;
    }

    /**
     * Get coordonnee
     *
     * @return \AppBundle\Entity\Coordonnee
     */
    public function getCoordonnee()
    {
        return $this->coordonnee;
    }

    /**
     * Add listeComission
     *
     * @param \AppBundle\Entity\PlanningComission $listeComission
     *
     * @return UtilisateurApi
     */
    public function addListeComission(\AppBundle\Entity\PlanningComission $listeComission)
    {
        $this->listeComissions[] = $listeComission;

        return $this;
    }

    /**
     * Remove listeComission
     *
     * @param \AppBundle\Entity\PlanningComission $listeComission
     */
    public function removeListeComission(\AppBundle\Entity\PlanningComission $listeComission)
    {
        $this->listeComissions->removeElement($listeComission);
    }

    /**
     * Get listeComissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListeComissions()
    {
        return $this->listeComissions;
    }

    /**
     * Set nomSociete
     *
     * @param string $nomSociete
     *
     * @return UtilisateurApi
     */
    public function setNomSociete($nomSociete)
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    /**
     * Get nomSociete
     *
     * @return string
     */
    public function getNomSociete()
    {
        return $this->nomSociete;
    }


    /**
     * Add listeReservation
     *
     * @param \AppBundle\Entity\Reservation $listeReservation
     *
     * @return UtilisateurApi
     */
    public function addListeReservation(\AppBundle\Entity\Reservation $listeReservation)
    {
        $this->listeReservations[] = $listeReservation;

        return $this;
    }

    /**
     * Remove listeReservation
     *
     * @param \AppBundle\Entity\Reservation $listeReservation
     */
    public function removeListeReservation(\AppBundle\Entity\Reservation $listeReservation)
    {
        $this->listeReservations->removeElement($listeReservation);
    }

    /**
     * Get listeReservations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListeReservations()
    {
        return $this->listeReservations;
    }

    /**
     * Set userIsAdmin
     *
     * @param boolean $userIsAdmin
     *
     * @return UtilisateurApi
     */
    public function setIsAdmin($userIsAdmin)
    {
        $this->isAdmin = $userIsAdmin;

        return $this;
    }

    /**
     * Get userIsAdmin
     *
     * @return boolean
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
}
