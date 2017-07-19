<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateCourseRepository")
 * @ORM\Table(name="stateCourse")
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
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dateCreated;

    /**
     * StateCourse constructor.
     */
    public function __construct()
    {
        $this->dateCreated = new DateTime();
    }

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
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated(DateTime $dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    function __toString()
    {
        return $this->getCourseName() . ', ' . $this->getStateCourseCode();
    }


}