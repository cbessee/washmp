<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeacherRepository")
 * @ORM\Table(name="Teachers")
 */
class Teacher
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $teacherID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $teacherName;

    /**
     * @return mixed
     */
    public function getTeacherID()
    {
        return $this->teacherID;
    }

    /**
     * @return mixed
     */
    public function getTeacherName()
    {
        return $this->teacherName;
    }

    /**
     * @param mixed $teacherName
     */
    public function setTeacherName($teacherName)
    {
        $this->teacherName = $teacherName;
    }

    function __toString()
    {
        return $this->getTeacherName();
    }


}