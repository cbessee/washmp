<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\K12CenterRepository")
 * @ORM\Table(name="K12Center")
 */
class K12Center
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $k12CenterID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $centerName;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $centerAbbr;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\K12District", mappedBy="center")
     */
    private $districts;

    /**
     * K12Center constructor.
     */
    public function __construct()
    {
        $this->districts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getK12CenterID()
    {
        return $this->k12CenterID;
    }

    /**
     * @return mixed
     */
    public function getCenterName()
    {
        return $this->centerName;
    }

    /**
     * @param mixed $centerName
     */
    public function setCenterName($centerName)
    {
        $this->centerName = $centerName;
    }

    /**
     * @return mixed
     */
    public function getCenterAbbr()
    {
        return $this->centerAbbr;
    }

    /**
     * @param mixed $centerAbbr
     */
    public function setCenterAbbr($centerAbbr)
    {
        $this->centerAbbr = $centerAbbr;
    }

    public function __toString() {
        return $this->getCenterName();
    }
}