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
     * @ORM\Column(type="string")
     */
    private $grade;


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

    public function __toString()
    {
        return $this->getGrade();
    }
}