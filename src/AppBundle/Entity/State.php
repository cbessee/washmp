<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateRepository")
 * @ORM\Table(name="state")
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $stateID;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="2")
     * @ORM\Column(type="string")
     */
    private $stateAbbr;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $stateName;

    /**
     * @return mixed
     */
    public function getStateAbbr()
    {
        return $this->stateAbbr;
    }

    /**
     * @param mixed $stateAbbr
     */
    public function setStateAbbr($stateAbbr)
    {
        $this->stateAbbr = $stateAbbr;
    }

    /**
     * @return mixed
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * @param mixed $stateName
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;
    }

    public function __toString()
    {
        return $this->getStateAbbr() . ', ' . $this->getStateName();
    }

}
