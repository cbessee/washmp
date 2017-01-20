<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Race;
use AppBundle\Entity\Student;
use AppBundle\Entity\State;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__ . '/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    public function student()
    {

    }

    public function state()
    {
    }

    public function race()
    {

    }

}