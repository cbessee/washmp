<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\K12SchoolRepository")
 * @ORM\Table(name="K12School")
 */
class K12School
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $k12SchoolID;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $schoolID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $schoolName;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\K12District")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="k12district_id", nullable=false)
     */
    private $district;

    /**
     * @return mixed
     */
    public function getK12SchoolID()
    {
        return $this->k12SchoolID;
    }

    /**
     * @return mixed
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * @param mixed $schoolName
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $districtID
     */
    public function setDistrict(K12District $district = null)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getSchoolID()
    {
        return $this->schoolID;
    }

    /**
     * @param mixed $schoolID
     */
    public function setSchoolID($schoolID)
    {
        $this->schoolID = $schoolID;
    }

}