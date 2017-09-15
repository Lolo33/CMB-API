<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Echange
 *
 * @ORM\Table(name="echange")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EchangeRepository")
 */
class Echange
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="EchangeType")
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="initiateur", type="boolean")
     */
    private $initiateur;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255)
     */
    private $resume;

    /**
     * @var Complexe
     *
     * @ORM\ManyToOne(targetEntity="Complexe")
     */
    private $complexe;



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
     * @return Echange
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
     * Set type
     *
     * @param string $type
     *
     * @return Echange
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set initiateur
     *
     * @param boolean $initiateur
     *
     * @return Echange
     */
    public function setInitiateur($initiateur)
    {
        $this->initiateur = $initiateur;

        return $this;
    }

    /**
     * Get initiateur
     *
     * @return bool
     */
    public function getInitiateur()
    {
        return $this->initiateur;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Echange
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set complexe
     *
     * @param \AppBundle\Entity\Complexe $complexe
     *
     * @return Echange
     */
    public function setComplexe(\AppBundle\Entity\Complexe $complexe = null)
    {
        $this->complexe = $complexe;

        return $this;
    }

    /**
     * Get complexe
     *
     * @return \AppBundle\Entity\Complexe
     */
    public function getComplexe()
    {
        return $this->complexe;
    }
}
