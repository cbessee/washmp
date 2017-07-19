<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Race;
use Doctrine\ORM\EntityRepository;

class K12AIFRepository extends EntityRepository
{
    public function getAIFByID($aif_id)
    {
        return $this->createQueryBuilder('K12AIF')
            ->where('K12AIF.k12AifID = :aifID')
            ->setParameter('aifID', $aif_id);
    }
}