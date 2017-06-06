<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="FuturePlan")
 */
class FuturePlan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $futurePlanID;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $futurePlan;

    /**
     * @return mixed
     */
    public function getFuturePlan()
    {
        return $this->futurePlan;
    }

    /**
     * @param mixed $futurePlan
     */
    public function setFuturePlan($futurePlan)
    {
        $this->futurePlan = $futurePlan;
    }

    /**
     * @return mixed
     */
    public function getFuturePlanID()
    {
        return $this->futurePlanID;
    }

    function __toString()
    {
        return $this->getFuturePlan();
    }


}