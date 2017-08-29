<?php

/*
 * Structure of this model is far from ideal. Tables for questions, poss answers, and answers is more robust when time permits.
 * Needs and form are likely to change. Going with simplest DB structure possible
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\FuturePlan;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeniorSurveyRepository")
 * @ORM\Table(name="SeniorSurvey")
 * @ORM\HasLifecycleCallbacks()
 */
class SeniorSurvey
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $seniorSurveyID;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="SeniorSurveys")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
     */
    private $student;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $afterSchoolRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $classRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $fieldTripsRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $internshipsRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $juniorSeniorProgramRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $competitonsMesaDayRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $mesaClubRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $mentoringRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $saturdayAcademyRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $sbacEocRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $summerProgramRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $collegeWorkshopRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $financialAidWorkshopRating;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $satActWorkshopRating;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $otherActivities;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $otherActivitiesRating;

    /**
     * @ORM\Column(type="boolean")
     */
    private $createdPlan;

    /**
     * @ORM\Column(type="boolean")
     */
    private $discussedPlan;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $planHelpfullness;

    /**
     * @ORM\Column(type="boolean")
     */
    private $appliedCollege;

    /**
     * @ORM\Column(type="boolean")
     */
    private $acceptedCollege;

    /**
     * @ORM\Column(type="boolean")
     */
    private $receivedScholarships;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\FuturePlan")
     * @ORM\JoinTable(name="surveyFuturePlans", joinColumns={@ORM\JoinColumn(name="seniorSurveyID", referencedColumnName="senior_survey_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="futurePlanID", referencedColumnName="future_plan_id")})
     */
    private $futurePlans;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $notAttendingReason;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $notAttendingOther;

    /**
     * @ORM\Column(type="string")
     */
    private $payingCollege;

    /**
     * @ORM\Column(type="string")
     */
    private $financialAid;

    /**
     * @ORM\Column(type="string")
     */
    private $livingAway;

    /**
     * @ORM\Column(type="string")
     */
    private $parentalSupport;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModified;

   /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @param mixed $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateModifiedDate()
    {
        $this->setDateModified(new \DateTime());
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
     * @return mixed
     */
    public function getCompetitonsMesaDayRating()
    {
        return $this->competitonsMesaDayRating;
    }

    /**
     * @return mixed
     */
    public function getAfterSchoolRating()
    {
        return $this->afterSchoolRating;
    }

    /**
     * @param mixed $afterSchoolRating
     */
    public function setAfterSchoolRating($afterSchoolRating)
    {
        $this->afterSchoolRating = $afterSchoolRating;
    }

    /**
     * @return mixed
     */
    public function getClassRating()
    {
        return $this->classRating;
    }

    /**
     * @param mixed $classRating
     */
    public function setClassRating($classRating)
    {
        $this->classRating = $classRating;
    }

    /**
     * @return mixed
     */
    public function getFieldTripsRating()
    {
        return $this->fieldTripsRating;
    }

    /**
     * @param mixed $fieldTripsRating
     */
    public function setFieldTripsRating($fieldTripsRating)
    {
        $this->fieldTripsRating = $fieldTripsRating;
    }

    /**
     * @return mixed
     */
    public function getInternshipsRating()
    {
        return $this->internshipsRating;
    }

    /**
     * @param mixed $internshipsRating
     */
    public function setInternshipsRating($internshipsRating)
    {
        $this->internshipsRating = $internshipsRating;
    }

    /**
     * @return mixed
     */
    public function getJuniorSeniorProgramRating()
    {
        return $this->juniorSeniorProgramRating;
    }

    /**
     * @param mixed $juniorSeniorProgramRating
     */
    public function setJuniorSeniorProgramRating($juniorSeniorProgramRating)
    {
        $this->juniorSeniorProgramRating = $juniorSeniorProgramRating;
    }

    /**
     * @return mixed
     */
    public function getCompetitionsMesaDayRating()
    {
        return $this->competitonsMesaDayRating;
    }

    /**
     * @param mixed $competitonsMesaDayRating
     */
    public function setCompetitionsMesaDayRating($competitonsMesaDayRating)
    {
        $this->competitonsMesaDayRating = $competitonsMesaDayRating;
    }

    /**
     * @return mixed
     */
    public function getMesaClubRating()
    {
        return $this->mesaClubRating;
    }

    /**
     * @param mixed $mesaClubRating
     */
    public function setMesaClubRating($mesaClubRating)
    {
        $this->mesaClubRating = $mesaClubRating;
    }

    /**
     * @return mixed
     */
    public function getMentoringRating()
    {
        return $this->mentoringRating;
    }

    /**
     * @param mixed $mentoringRating
     */
    public function setMentoringRating($mentoringRating)
    {
        $this->mentoringRating = $mentoringRating;
    }

    /**
     * @return mixed
     */
    public function getSaturdayAcademyRating()
    {
        return $this->saturdayAcademyRating;
    }

    /**
     * @param mixed $saturdayAcademyRating
     */
    public function setSaturdayAcademyRating($saturdayAcademyRating)
    {
        $this->saturdayAcademyRating = $saturdayAcademyRating;
    }

    /**
     * @return mixed
     */
    public function getSbacEocRating()
    {
        return $this->sbacEocRating;
    }

    /**
     * @param mixed $sbacEocRating
     */
    public function setSbacEocRating($sbacEocRating)
    {
        $this->sbacEocRating = $sbacEocRating;
    }

    /**
     * @return mixed
     */
    public function getSummerProgramRating()
    {
        return $this->summerProgramRating;
    }

    /**
     * @param mixed $summerProgramRating
     */
    public function setSummerProgramRating($summerProgramRating)
    {
        $this->summerProgramRating = $summerProgramRating;
    }

    /**
     * @return mixed
     */
    public function getCollegeWorkshopRating()
    {
        return $this->collegeWorkshopRating;
    }

    /**
     * @param mixed $collegeWorkshopRating
     */
    public function setCollegeWorkshopRating($collegeWorkshopRating)
    {
        $this->collegeWorkshopRating = $collegeWorkshopRating;
    }

    /**
     * @return mixed
     */
    public function getFinancialAidWorkshopRating()
    {
        return $this->financialAidWorkshopRating;
    }

    /**
     * @param mixed $financialAidWorkshopRating
     */
    public function setFinancialAidWorkshopRating($financialAidWorkshopRating)
    {
        $this->financialAidWorkshopRating = $financialAidWorkshopRating;
    }

    /**
     * @return mixed
     */
    public function getSatActWorkshopRating()
    {
        return $this->satActWorkshopRating;
    }

    /**
     * @param mixed $satActWorkshopRating
     */
    public function setSatActWorkshopRating($satActWorkshopRating)
    {
        $this->satActWorkshopRating = $satActWorkshopRating;
    }

    /**
     * @return mixed
     */
    public function getOtherActivities()
    {
        return $this->otherActivities;
    }

    /**
     * @param mixed $otherActivities
     */
    public function setOtherActivities($otherActivities)
    {
        $this->otherActivities = $otherActivities;
    }

    /**
     * @return mixed
     */
    public function getOtherActivitiesRating()
    {
        return $this->otherActivitiesRating;
    }

    /**
     * @param mixed $otherActivitiesRating
     */
    public function setOtherActivitiesRating($otherActivitiesRating)
    {
        $this->otherActivitiesRating = $otherActivitiesRating;
    }

    /**
     * @return mixed
     */
    public function getCreatedPlan()
    {
        return $this->createdPlan;
    }

    /**
     * @param mixed $createdPlan
     */
    public function setCreatedPlan($createdPlan)
    {
        $this->createdPlan = $createdPlan;
    }

    /**
     * @return mixed
     */
    public function getDiscussedPlan()
    {
        return $this->discussedPlan;
    }

    /**
     * @param mixed $discussedPlan
     */
    public function setDiscussedPlan($discussedPlan)
    {
        $this->discussedPlan = $discussedPlan;
    }

    /**
     * @return mixed
     */
    public function getPlanHelpfullness()
    {
        return $this->planHelpfullness;
    }

    /**
     * @param mixed $planHelpfullness
     */
    public function setPlanHelpfullness($planHelpfullness)
    {
        $this->planHelpfullness = $planHelpfullness;
    }

    /**
     * @return mixed
     */
    public function getAppliedCollege()
    {
        return $this->appliedCollege;
    }

    /**
     * @param mixed $appliedCollege
     */
    public function setAppliedCollege($appliedCollege)
    {
        $this->appliedCollege = $appliedCollege;
    }

    /**
     * @return mixed
     */
    public function getAcceptedCollege()
    {
        return $this->acceptedCollege;
    }

    /**
     * @param mixed $acceptedCollege
     */
    public function setAcceptedCollege($acceptedCollege)
    {
        $this->acceptedCollege = $acceptedCollege;
    }

    /**
     * @return mixed
     */
    public function getReceivedScholarships()
    {
        return $this->receivedScholarships;
    }

    /**
     * @param mixed $receivedScholarships
     */
    public function setReceivedScholarships($receivedScholarships)
    {
        $this->receivedScholarships = $receivedScholarships;
    }

    /**
     * @return mixed
     */
    public function getFuturePlans()
    {
        return $this->futurePlans;
    }

    /**
     * @param mixed $futurePlans
     */
    public function setFuturePlans($futurePlans)
    {
        $this->futurePlans = $futurePlans;
    }

    /**
     * @return mixed
     */
    public function getNotAttendingReason()
    {
        return $this->notAttendingReason;
    }

    /**
     * @param mixed $notAttendingReason
     */
    public function setNotAttendingReason($notAttendingReason)
    {
        $this->notAttendingReason = $notAttendingReason;
    }

    /**
     * @return mixed
     */
    public function getNotAttendingOther()
    {
        return $this->notAttendingOther;
    }

    /**
     * @param mixed $notAttendingOther
     */
    public function setNotAttendingOther($notAttendingOther)
    {
        $this->notAttendingOther = $notAttendingOther;
    }

    /**
     * @return mixed
     */
    public function getPayingCollege()
    {
        return $this->payingCollege;
    }

    /**
     * @param mixed $payingCollege
     */
    public function setPayingCollege($payingCollege)
    {
        $this->payingCollege = $payingCollege;
    }

    /**
     * @return mixed
     */
    public function getFinancialAid()
    {
        return $this->financialAid;
    }

    /**
     * @param mixed $financialAid
     */
    public function setFinancialAid($financialAid)
    {
        $this->financialAid = $financialAid;
    }

    /**
     * @return mixed
     */
    public function getLivingAway()
    {
        return $this->livingAway;
    }

    /**
     * @param mixed $livingAway
     */
    public function setLivingAway($livingAway)
    {
        $this->livingAway = $livingAway;
    }

    /**
     * @return mixed
     */
    public function getParentalSupport()
    {
        return $this->parentalSupport;
    }

    /**
     * @param mixed $parentalSupport
     */
    public function setParentalSupport($parentalSupport)
    {
        $this->parentalSupport = $parentalSupport;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
    public function getSeniorSurveyID()
    {
        return $this->seniorSurveyID;
    }

    public function addFuturePlan(FuturePlan $futurePlan)
    {
        if($this->futurePlans->contains($futurePlan)){
            return;
        }
        $this->futurePlans[] = $futurePlan;
    }

    public function removeFuturePlan(FuturePlan $futurePlan)
    {
        $this->futurePlans->removeElement($futurePlan);
    }

    public function __construct()
    {
        $this->futurePlans = new ArrayCollection();
        $this->setDateCreated(new \DateTime());
        if ($this->getDateModified() == null) {
            $this->setDateModified(new \DateTime());
        }
    }


}