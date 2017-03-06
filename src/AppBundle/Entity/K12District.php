<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\K12Center as K12Center;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\K12DistrictRepository")
 * @ORM\Table(name="K12District")
 */
class K12District
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $k12DistrictID;

   /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $districtName;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $districtCode;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\K12Center")
     * @ORM\JoinColumn(name="center_id", referencedColumnName="k12center_id", nullable=false)
     */
    private $center;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getK12DistrictID()
    {
        return $this->k12DistrictID;
    }

    /**
     * @return mixed
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     * @param mixed $districtName
     */
    public function setDistrictName($districtName)
    {
        $this->districtName = $districtName;
    }

    /**
     * @return mixed
     */
    public function getDistrictCode()
    {
        return $this->districtCode;
    }

    /**
     * @param mixed $districtCode
     */
    public function setDistrictCode($districtCode)
    {
        $this->districtCode = $districtCode;
    }

    /**
     * @return mixed
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @param mixed $centerID
     */
    public function setCenter(K12Center $center)
    {
        $this->center = $center;
    }

    function __toString()
    {
        return $this->getDistrictName();
    }


}