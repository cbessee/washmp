<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CareerClusterRepository")
 * @ORM\Table(name="CareerCluster")
 */
class CareerCluster
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $careerClusterID;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $careerCluster;

    /**
     * @return mixed
     */
    public function getCareerClusterID()
    {
        return $this->careerClusterID;
    }

    /**
     * @return mixed
     */
    public function getCareerCluster()
    {
        return $this->careerCluster;
    }

    /**
     * @param mixed $careerCluster
     */
    public function setCareerCluster($careerCluster)
    {
        $this->careerCluster = $careerCluster;
    }

}