<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Race;
use AppBundle\Entity\Student;
use AppBundle\Entity\State;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $loader = new NativeLoader();
        $objects = $loader->loadFile(__DIR__ . '/fixtures.yml');
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