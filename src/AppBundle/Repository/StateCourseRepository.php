<?php

namespace AppBundle\Repository;

use AppBundle\Entity\StateCourse;
use Doctrine\ORM\EntityRepository;

class StateCourseRepository extends EntityRepository
{
    public function getMathClasses()
    {
       return $this->createQueryBuilder('stateCourse')
           ->leftJoin('stateCourse.subject', 'subject')
           ->where('subject.subjectArea = :subjectArea')
           ->setParameter('subjectArea', 'Math');
    }
    public function getScienceClasses()
    {
        return $this->createQueryBuilder('stateCourse')
            ->leftJoin('stateCourse.subject', 'subject')
            ->where('subject.subjectArea = :subjectArea')
            ->setParameter('subjectArea', 'Science');
    }
    public function getEnglishClasses()
    {
        return $this->createQueryBuilder('stateCourse')
            ->leftJoin('stateCourse.subject', 'subject')
            ->where('subject.subjectArea = :subjectArea')
            ->setParameter('subjectArea', 'English');
    }
}