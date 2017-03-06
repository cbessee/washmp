<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StateCourseSubjectRepository")
 * @ORM\Table(name="StateCourseSubject")
 */
class StateCourseSubject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $subjectID;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $subjectArea;

    /**
     * @return mixed
     */
    public function getSubjectID()
    {
        return $this->subjectID;
    }

    /**
     * @return mixed
     */
    public function getSubjectArea()
    {
        return $this->subjectArea;
    }

    /**
     * @param mixed $subjectArea
     */
    public function setSubjectArea($subjectArea)
    {
        $this->subjectArea = $subjectArea;
    }

}