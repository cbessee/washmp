<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\K12Center")
     * @ORM\JoinColumn(name="k12center_id", referencedColumnName="k12center_id", nullable=true)
     */
    private $center;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isWaMESA;

    public function __construct()
    {
        parent::__construct();
        $this->setIsWaMESA(false);
        $this->setCenter(null);
    }

    /**
     * @return mixed
     */
    public function getIsWaMESA()
    {
        return $this->isWaMESA;
    }

    /**
     * @param mixed $isWaMESA
     */
    public function setIsWaMESA($isWaMESA)
    {
        $this->isWaMESA = $isWaMESA;
    }

    /**
     * @return mixed
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @param mixed $center
     */
    public function setCenter($center)
    {
        $this->center = $center;
    }


}