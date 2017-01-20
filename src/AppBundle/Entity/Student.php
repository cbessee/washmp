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
     * @ORM\Column(type="integer", unique=true)
     */
    private $stateStudentID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @Assert\Length(min=0, max=1, maxMessage="Middle Initial must be 1 character in length")
     * @ORM\Column(type="string")
     */
    private $middleInitial;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $lastName;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneNumber;

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
     * @ORM\JoinColumn(name="state_id", referencedColumnName="state_id")
     */
    private $state;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=5, max=5, minMessage="US Zipodes are 5 numbers long", maxMessage="US Zipcodes are 5 numbers long")
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
     * @ORM\Column(type="integer")
     * @Assert\Range(min=0, max=3)
     */
    private $householdSize;

    /**
     * @ORM\Column(type="boolean")
     */
    private $freeReducedLunch;

    /**
     * @ORM\Column(type="boolean")
     */
    private $homeComputerAccess;

    /**
     * @ORM\Column(type="boolean")
     */
    private $homeInternetAccess;

    /**
     * @ORM\Column(type="boolean")
     */
    private $homeNonEnglishLanguage;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $dateCreated;

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
}