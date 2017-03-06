<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateCourseRepository")
 * @ORM\Table(name="StateCourse")
 */
class StateCourse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $courseID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $stateCourseCode;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $courseName;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StateCourseSubject")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="subject_id", nullable=false)
     */
    private $subject;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="boolean")
     */
    private $AP;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInactive;

    /**
     * @return mixed
     */
    public function getCourseID()
    {
        return $this->courseID;
    }

    /**
     * @return mixed
     */
    public function getStateCourseCode()
    {
        return $this->stateCourseCode;
    }

    /**
     * @param mixed $stateCourseCode
     */
    public function setStateCourseCode($stateCourseCode)
    {
        $this->stateCourseCode = $stateCourseCode;
    }

    /**
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @param mixed $courseName
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getAP()
    {
        return $this->AP;
    }

    /**
     * @param mixed $AP
     */
    public function setAP($AP)
    {
        $this->AP = $AP;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateInactive()
    {
        return $this->dateInactive;
    }

    /**
     * @param mixed $dateInactive
     */
    public function setDateInactive($dateInactive)
    {
        $this->dateInactive = $dateInactive;
    }

}