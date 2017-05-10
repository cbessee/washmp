<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AcademicYearRepository")
 * @ORM\Table(name="AcademicYear")
 */
class AcademicYear
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $academicYearID;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $academicYearRange;

    /**
     * @return mixed
     */
    public function getAcademicYearID()
    {
        return $this->academicYearID;
    }

    /**
     * @return mixed
     */
    public function getAcademicYearRange()
    {
        return $this->academicYearRange;
    }

    /**
     * @param mixed $academicYearRange
     */
    public function setAcademicYearRange($academicYearRange)
    {
        $this->academicYearRange = $academicYearRange;
    }

    function __toString()
    {
        return $this->getAcademicYearRange();
    }


}
