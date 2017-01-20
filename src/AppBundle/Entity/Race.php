<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RaceRepository")
 * @ORM\Table(name="race")
 */
class Race
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $raceID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $raceCode;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $raceName;

    /**
     * @return mixed
     */
    public function getRaceCode()
    {
        return $this->raceCode;
    }

    /**
     * @param mixed $raceCode
     */
    public function setRaceCode($raceCode)
    {
        $this->raceCode = $raceCode;
    }

    /**
     * @return mixed
     */
    public function getRaceName()
    {
        return $this->raceName;
    }

    /**
     * @param mixed $raceName
     */
    public function setRaceName($raceName)
    {
        $this->raceName = $raceName;
    }

    public function __toString()
    {
        return $this->getRaceCode() . ', ' . $this->getRaceName();
    }
}