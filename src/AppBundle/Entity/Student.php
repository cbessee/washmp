<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 * @ORM\Table(name="student")
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="bigint", unique=true)
     */
    private $stateStudentID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @Assert\Length(min=0, max=1, maxMessage="Middle Initial must be 1 character in length")
     * @ORM\Column(type="string", nullable=true)
     */
    private $middleInitial = '';

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $lastName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phoneNumber = '';

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $streetAddress;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $city;

   /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="state_id", nullable=false)
     */
    private $state;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=10000, max=99999, minMessage="US Zipodes are 5 numbers long", maxMessage="US Zipcodes are 5 numbers long")
     * @ORM\Column(type="integer")
     */
    private $zipCode;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $gender;

    /**
     * @ORM\Column(type="string")
     */
    private $ethnicity;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Race")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="race_id")
     */
    private $race;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $householdSize;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="boolean")
     */
    private $freeReducedLunch;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="boolean")
     */
    private $homeComputerAccess;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="boolean")
     */
    private $homeInternetAccess;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="boolean")
     */
    private $homeNonEnglishLanguage;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $dateCreated;

   /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianLastName;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianFirstName;

    /**
     * @Assert\Length(min="0", max="1", maxMessage="Initial cannot be greater than 1 letter")
     * @ORM\Column(type="string", nullable=true)
     */
    private $primaryGuardianMiddleInitial;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianAddress;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianCity;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State")
     * @ORM\JoinColumn(name="primary_guardian_state_id", referencedColumnName="state_id", nullable=false)
     */
    private $primaryGuardianState;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $primaryGuardianZipCode;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianEmail;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $primaryGuardianPhone;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $primaryGuardianOccupation;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $primaryGuardianEmployer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $primaryGuardianIsCollegeGraduate;

   /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianLastName = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianFirstName = '';

    /**
     * @Assert\Length(min=0, max=1, maxMessage="Middle Initial must be 1 character in length")
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianMiddleInitial = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianAddress = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianCity = '';

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\State")
     * @ORM\JoinColumn(name="secondary_guardian_state_id", referencedColumnName="state_id", nullable=true)
     */
    private $secondaryGuardianState;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $secondaryGuardianZipCode = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Email()
     */
    private $secondaryGuardianEmail = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianPhone = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianOccupation = '';

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondaryGuardianEmployer = '';

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $secondaryGuardianIsCollegeGraduate = null;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStateStudentID()
    {
        return $this->stateStudentID;
    }

    /**
     * @param mixed $stateStudentID
     */
    public function setStateStudentID($stateStudentID)
    {
        $this->stateStudentID = $stateStudentID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    /**
     * @param mixed $middleInitial
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param mixed $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getEthnicity()
    {
        return $this->ethnicity;
    }

    /**
     * @param mixed $ethnicity
     */
    public function setEthnicity($ethnicity)
    {
        $this->ethnicity = $ethnicity;
    }

    /**
     * @return mixed
     */
    public function getHouseholdSize()
    {
        return $this->householdSize;
    }

    /**
     * @param mixed $householdSize
     */
    public function setHouseholdSize($householdSize)
    {
        $this->householdSize = $householdSize;
    }

    /**
     * @return mixed
     */
    public function getFreeReducedLunch()
    {
        return $this->freeReducedLunch;
    }

    /**
     * @param mixed $freeReducedLunch
     */
    public function setFreeReducedLunch($freeReducedLunch)
    {
        $this->freeReducedLunch = $freeReducedLunch;
    }

    /**
     * @return mixed
     */
    public function getHomeComputerAccess()
    {
        return $this->homeComputerAccess;
    }

    /**
     * @param mixed $homeComputerAccess
     */
    public function setHomeComputerAccess($homeComputerAccess)
    {
        $this->homeComputerAccess = $homeComputerAccess;
    }

    /**
     * @return mixed
     */
    public function getHomeInternetAccess()
    {
        return $this->homeInternetAccess;
    }

    /**
     * @param mixed $homeInternetAccess
     */
    public function setHomeInternetAccess($homeInternetAccess)
    {
        $this->homeInternetAccess = $homeInternetAccess;
    }

    /**
     * @return mixed
     */
    public function getHomeNonEnglishLanguage()
    {
        return $this->homeNonEnglishLanguage;
    }

    /**
     * @param mixed $homeNonEnglishLanguage
     */
    public function setHomeNonEnglishLanguage($homeNonEnglishLanguage)
    {
        $this->homeNonEnglishLanguage = $homeNonEnglishLanguage;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState(State $state = null)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

       /**
     * @return mixed
     */
    public function getPrimaryGuardianLastName()
    {
        return $this->primaryGuardianLastName;
    }

    /**
     * @param mixed $primaryGuardianLastName
     */
    public function setPrimaryGuardianLastName($primaryGuardianLastName)
    {
        $this->primaryGuardianLastName = $primaryGuardianLastName;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianFirstName()
    {
        return $this->primaryGuardianFirstName;
    }

    /**
     * @param mixed $primaryGuardianFirstName
     */
    public function setPrimaryGuardianFirstName($primaryGuardianFirstName)
    {
        $this->primaryGuardianFirstName = $primaryGuardianFirstName;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianMiddleInitial()
    {
        return $this->primaryGuardianMiddleInitial;
    }

    /**
     * @param mixed $primaryGuardianMiddleInitial
     */
    public function setPrimaryGuardianMiddleInitial($primaryGuardianMiddleInitial)
    {
        $this->primaryGuardianMiddleInitial = $primaryGuardianMiddleInitial;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianAddress()
    {
        return $this->primaryGuardianAddress;
    }

    /**
     * @param mixed $primaryGuardianAddress
     */
    public function setPrimaryGuardianAddress($primaryGuardianAddress)
    {
        $this->primaryGuardianAddress = $primaryGuardianAddress;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianCity()
    {
        return $this->primaryGuardianCity;
    }

    /**
     * @param mixed $primaryGuardianCity
     */
    public function setPrimaryGuardianCity($primaryGuardianCity)
    {
        $this->primaryGuardianCity = $primaryGuardianCity;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianState()
    {
        return $this->primaryGuardianState;
    }

    /**
     * @param mixed $primaryGuardianState
     */
    public function setPrimaryGuardianState(State $primaryGuardianState = null)
    {
        $this->primaryGuardianState = $primaryGuardianState;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianZipCode()
    {
        return $this->primaryGuardianZipCode;
    }

    /**
     * @param mixed $primaryGuardianZipCode
     */
    public function setPrimaryGuardianZipCode($primaryGuardianZipCode)
    {
        $this->primaryGuardianZipCode = $primaryGuardianZipCode;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianEmail()
    {
        return $this->primaryGuardianEmail;
    }

    /**
     * @param mixed $primaryGuardianEmail
     */
    public function setPrimaryGuardianEmail($primaryGuardianEmail)
    {
        $this->primaryGuardianEmail = $primaryGuardianEmail;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianPhone()
    {
        return $this->primaryGuardianPhone;
    }

    /**
     * @param mixed $primaryGuardianPhone
     */
    public function setPrimaryGuardianPhone($primaryGuardianPhone)
    {
        $this->primaryGuardianPhone = $primaryGuardianPhone;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianOccupation()
    {
        return $this->primaryGuardianOccupation;
    }

    /**
     * @param mixed $primaryGuardianOccupation
     */
    public function setPrimaryGuardianOccupation($primaryGuardianOccupation)
    {
        $this->primaryGuardianOccupation = $primaryGuardianOccupation;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianEmployer()
    {
        return $this->primaryGuardianEmployer;
    }

    /**
     * @param mixed $primaryGuardianEmployer
     */
    public function setPrimaryGuardianEmployer($primaryGuardianEmployer)
    {
        $this->primaryGuardianEmployer = $primaryGuardianEmployer;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGuardianIsCollegeGraduate()
    {
        return $this->primaryGuardianIsCollegeGraduate;
    }

    /**
     * @param mixed $primaryGuardianIsCollegeGraduate
     */
    public function setPrimaryGuardianIsCollegeGraduate($primaryGuardianIsCollegeGraduate)
    {
        $this->primaryGuardianIsCollegeGraduate = $primaryGuardianIsCollegeGraduate;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianLastName()
    {
        return $this->secondaryGuardianLastName;
    }

    /**
     * @param mixed $secondaryGuardianLastName
     */
    public function setSecondaryGuardianLastName($secondaryGuardianLastName)
    {
        $this->secondaryGuardianLastName = $secondaryGuardianLastName;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianFirstName()
    {
        return $this->secondaryGuardianFirstName;
    }

    /**
     * @param mixed $secondaryGuardianFirstName
     */
    public function setSecondaryGuardianFirstName($secondaryGuardianFirstName)
    {
        $this->secondaryGuardianFirstName = $secondaryGuardianFirstName;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianMiddleInitial()
    {
        return $this->secondaryGuardianMiddleInitial;
    }

    /**
     * @param mixed $secondaryGuardianMiddleInitial
     */
    public function setSecondaryGuardianMiddleInitial($secondaryGuardianMiddleInitial)
    {
        $this->secondaryGuardianMiddleInitial = $secondaryGuardianMiddleInitial;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianAddress()
    {
        return $this->secondaryGuardianAddress;
    }

    /**
     * @param mixed $secondaryGuardianAddress
     */
    public function setSecondaryGuardianAddress($secondaryGuardianAddress)
    {
        $this->secondaryGuardianAddress = $secondaryGuardianAddress;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianCity()
    {
        return $this->secondaryGuardianCity;
    }

    /**
     * @param mixed $secondaryGuardianCity
     */
    public function setSecondaryGuardianCity($secondaryGuardianCity)
    {
        $this->secondaryGuardianCity = $secondaryGuardianCity;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianState()
    {
        return $this->secondaryGuardianState;
    }

    /**
     * @param mixed $secondaryGuardianState
     */
    public function setSecondaryGuardianState(State $secondaryGuardianState = null)
    {
        $this->secondaryGuardianState = $secondaryGuardianState;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianZipCode()
    {
        return $this->secondaryGuardianZipCode;
    }

    /**
     * @param mixed $secondaryGuardianZipCode
     */
    public function setSecondaryGuardianZipCode($secondaryGuardianZipCode)
    {
        $this->secondaryGuardianZipCode = $secondaryGuardianZipCode;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianEmail()
    {
        return $this->secondaryGuardianEmail;
    }

    /**
     * @param mixed $secondaryGuardianEmail
     */
    public function setSecondaryGuardianEmail($secondaryGuardianEmail)
    {
        $this->secondaryGuardianEmail = $secondaryGuardianEmail;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianPhone()
    {
        return $this->secondaryGuardianPhone;
    }

    /**
     * @param mixed $secondaryGuardianPhone
     */
    public function setSecondaryGuardianPhone($secondaryGuardianPhone)
    {
        $this->secondaryGuardianPhone = $secondaryGuardianPhone;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianOccupation()
    {
        return $this->secondaryGuardianOccupation;
    }

    /**
     * @param mixed $secondaryGuardianOccupation
     */
    public function setSecondaryGuardianOccupation($secondaryGuardianOccupation)
    {
        $this->secondaryGuardianOccupation = $secondaryGuardianOccupation;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianEmployer()
    {
        return $this->secondaryGuardianEmployer;
    }

    /**
     * @param mixed $secondaryGuardianEmployer
     */
    public function setSecondaryGuardianEmployer($secondaryGuardianEmployer)
    {
        $this->secondaryGuardianEmployer = $secondaryGuardianEmployer;
    }

    /**
     * @return mixed
     */
    public function getSecondaryGuardianIsCollegeGraduate()
    {
        return $this->secondaryGuardianIsCollegeGraduate;
    }

    /**
     * @param mixed $secondaryGuardianIsCollegeGraduate
     */
    public function setSecondaryGuardianIsCollegeGraduate($secondaryGuardianIsCollegeGraduate)
    {
        $this->secondaryGuardianIsCollegeGraduate = $secondaryGuardianIsCollegeGraduate;
    }

}