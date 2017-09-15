<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueNavigationComplexe
 *
 * @ORM\Table(name="historique_navigation_complexe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HistoriqueNavigationComplexeRepository")
 */
class HistoriqueNavigationComplexe
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_visite", type="datetime")
     */
    private $debutVisite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_visite", type="datetime", nullable=true)
     */
    private $finVisite;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Complexe")
     */
    private $complexe;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;


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
     * Set url
     *
     * @param string $url
     *
     * @return HistoriqueNavigationComplexe
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set debutVisite
     *
     * @param \DateTime $debutVisite
     *
     * @return HistoriqueNavigationComplexe
     */
    public function setDebutVisite($debutVisite)
    {
        $this->debutVisite = $debutVisite;

        return $this;
    }

    /**
     * Get debutVisite
     *
     * @return \DateTime
     */
    public function getDebutVisite()
    {
        return $this->debutVisite;
    }

    /**
     * Set finVisite
     *
     * @param \DateTime $finVisite
     *
     * @return HistoriqueNavigationComplexe
     */
    public function setFinVisite($finVisite)
    {
        $this->finVisite = $finVisite;

        return $this;
    }

    /**
     * Get finVisite
     *
     * @return \DateTime
     */
    public function getFinVisite()
    {
        return $this->finVisite;
    }

    /**
     * Set complexe
     *
     * @param string $complexe
     *
     * @return HistoriqueNavigationComplexe
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
     * Set ip
     *
     * @param string $ip
     *
     * @return HistoriqueNavigationComplexe
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}

