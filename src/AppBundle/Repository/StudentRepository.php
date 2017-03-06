<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Student;
use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function searchAll($search)
    {
        return $this->createQueryBuilder('student')
            ->where('student.stateStudentID = :stateStudentID')
            ->setParameter('stateStudentID', $search)
            ->orWhere("CONCAT(student.firstName, ' ', student.lastName) LIKE :name")
            ->setParameter('name', '%'.$search.'%')
            ->getQuery()
            ->execute();
    }

    public function getStudentBySSID($SSID)
    {
        return $this->createQueryBuilder('student')
            ->where('student.stateStudentID = :stateStudentID')
            ->setParameter('stateStudentID', $SSID)
            ->getQuery()
            ->execute();
    }
}