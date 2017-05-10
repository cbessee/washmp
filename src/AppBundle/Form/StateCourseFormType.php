<?php

namespace AppBundle\Form;

use AppBundle\Entity\StateCourse;
use AppBundle\Entity\StateCourseSubject;
use AppBundle\Repository\StateCourseRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateCourseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stateCourseCode')
            ->add('courseName')
            ->add('subject');
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\StateCourse'
        ]);
    }
}