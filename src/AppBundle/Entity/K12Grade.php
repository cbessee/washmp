<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\K12GradeRepository")
 * @ORM\Table(name="K12Grades")
 */
class K12Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $k12GradeID;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="12")
     * @ORM\Column(type="integer")
     */
    private $grade;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $schoolLevel;

    /**
     * @return mixed
     */
    public function getK12GradeID()
    {
        return $this->k12GradeID;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return mixed
     */
    public function getSchoolLevel()
    {
        return $this->schoolLevel;
    }

    /**
     * @param mixed $schoolLevel
     */
    public function setSchoolLevel($schoolLevel)
    {
        $this->schoolLevel = $schoolLevel;
    }
}