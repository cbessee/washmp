<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUsersByRole($Role)
    {
        return $this->createQueryBuilder('user')
            ->where('user.roles LIKE :roleString')
            ->setParameter('roleString', '%'.$Role.'%')
            ->getQuery()
            ->execute();
    }
}