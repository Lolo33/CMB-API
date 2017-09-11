<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComplexeGerant
 *
 * @ORM\Table(name="complexe_gerant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComplexeGerantRepository")
 */
class ComplexeGerant
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
     * @ORM\ManyToOne(targetEntity="Complexe")
     */
    private $complexe;

    /**
     * @var string
     *
     * @ORM\Column(name="gerant_username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="gerant_password", type="string", length=255)
     */
    private $password;


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
     * Set complexe
     *
     * @param string $complexe
     *
     * @return ComplexeGerant
     */
    public function setComplexe($complexe)
    {
        $this->complexe = $complexe;

        return $this;
    }

    /**
     * Get complexe
     *
     * @return string
     */
    public function getComplexe()
    {
        return $this->complexe;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return ComplexeGerant
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return ComplexeGerant
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}

