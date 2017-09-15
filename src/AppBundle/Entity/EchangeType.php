<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EchangeType
 *
 * @ORM\Table(name="echange_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeEchangeRepository")
 */
class EchangeType
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
     * @ORM\Column(name="typeNom", type="string", length=255)
     */
    private $typeNom;

    /**
     * @var string
     *
     * @ORM\Column(name="typeImg", type="string", length=255)
     */
    private $typeImg;


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
     * Set typeNom
     *
     * @param string $typeNom
     *
     * @return EchangeType
     */
    public function setTypeNom($typeNom)
    {
        $this->typeNom = $typeNom;

        return $this;
    }

    /**
     * Get typeNom
     *
     * @return string
     */
    public function getTypeNom()
    {
        return $this->typeNom;
    }

    /**
     * Set typeImg
     *
     * @param string $typeImg
     *
     * @return EchangeType
     */
    public function setTypeImg($typeImg)
    {
        $this->typeImg = $typeImg;

        return $this;
    }

    /**
     * Get typeImg
     *
     * @return string
     */
    public function getTypeImg()
    {
        return $this->typeImg;
    }
}

