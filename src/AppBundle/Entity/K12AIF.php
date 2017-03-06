<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\K12AIFRepository")
 * @ORM\Table(name="K12AIF")
 */
class K12AIF
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $k12AifID;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="K12AIFs")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
     */
    private $student;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\K12School")
     * @ORM\JoinColumn(name="k12school_id", referencedColumnName="k12school_id", nullable=false)
     */
    private $school;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $teacher;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Activity")
     * @ORM\JoinTable(name="K12AIFActivity", joinColumns={@ORM\JoinColumn(name="k12aif_id", referencedColumnName="k12aif_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="activity_id")})
     */
    private $activities;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CareerCluster")
     * @ORM\JoinTable(name="K12AIFCareer", joinColumns={@ORM\JoinColumn(name="k12aif_id", referencedColumnName="k12aif_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="career_cluster_id", referencedColumnName="career_cluster_id")})
     */
    private $careers;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AcademicYear")
     * @ORM\JoinColumn(name="academic_year_id", referencedColumnName="academic_year_id", nullable=false)
     */
    private $currentAcademicYear;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\K12Grade")
     * @ORM\JoinColumn(name="k12grade_id", referencedColumnName="k12grade_id", nullable=false)
     */
    private $grade;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="float")
     */
    private $GPA;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $collegeGoal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $PSAT;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SAT;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ACT;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="date")
     */
    private $dateModified;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
        $this->activities = new ArrayCollection();
        $this->careers = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getK12AIFID()
    {
        return $this->k12AIFID;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

    /**
     * @return mixed
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param mixed $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param mixed $teacher
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * @return mixed
     */
    public function getCurrentAcademicYear()
    {
        return $this->currentAcademicYear;
    }

    /**
     * @param mixed $currentAcademicYear
     */
    public function setCurrentAcademicYear($currentAcademicYear)
    {
        $this->currentAcademicYear = $currentAcademicYear;
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
    public function getGPA()
    {
        return $this->GPA;
    }

    /**
     * @param mixed $GPA
     */
    public function setGPA($GPA)
    {
        $this->GPA = $GPA;
    }

    /**
     * @return mixed
     */
    public function getCollegeGoal()
    {
        return $this->collegeGoal;
    }

    /**
     * @param mixed $collegeGoal
     */
    public function setCollegeGoal($collegeGoal)
    {
        $this->collegeGoal = $collegeGoal;
    }

    /**
     * @return mixed
     */
    public function getPSAT()
    {
        return $this->PSAT;
    }

    /**
     * @param mixed $PSAT
     */
    public function setPSAT($PSAT)
    {
        $this->PSAT = $PSAT;
    }

    /**
     * @return mixed
     */
    public function getSAT()
    {
        return $this->SAT;
    }

    /**
     * @param mixed $SAT
     */
    public function setSAT($SAT)
    {
        $this->SAT = $SAT;
    }

    /**
     * @return mixed
     */
    public function getACT()
    {
        return $this->ACT;
    }

    /**
     * @param mixed $ACT
     */
    public function setACT($ACT)
    {
        $this->ACT = $ACT;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @param mixed $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    public function addCareer(CareerCluster $careerCluster)
    {
        if($this->careers->contains($careerCluster)){
            return;
        }
        $this->careers[] = $careerCluster;
    }

    public function removeCareer(CareerCluster $careerCluster)
    {
        $this->careers->removeElement($careerCluster);
    }

    /**
     * @return ArrayCollection|CareerCluster[]
     */
    public function getCareers()
    {
        return $this->careers;
    }

    public function addActivity(Activity $activity)
    {
        if($this->activities->contains($activity)){
            return;
        }
        $this->activities[] = $activity;
    }

    public function removeActivity(Activity $activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * @return ArrayCollection|Activity[]
     */
    public function getActivities()
    {
        return $this->activities;
    }

}