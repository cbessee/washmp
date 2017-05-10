<?php

namespace AppBundle\Form;

use AppBundle\Entity\Student;
use AppBundle\Entity\K12AIF;
use AppBundle\Entity\K12School;
use AppBundle\Entity\StateCourse;
use AppBundle\Entity\Teacher;
use AppBundle\Repository\StateCourseRepository;
use AppBundle\Repository\StudentRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnualIntakeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student', EntityType::class, [
                'class' => 'AppBundle\Entity\Student',
                'query_builder' => function (StudentRepository $studentRepository) use  ($options) {
                    return $studentRepository->getStudentByID($options['student']);
                },
                'label_attr' => [
                    'class' => 'hidden'
                ],
                'attr' => [
                    'class' => 'hidden',
                    'readonly' => true,
                ]
            ])
            ->add('currentAcademicYear', EntityType::class, [
                    'class' => 'AppBundle\Entity\AcademicYear',
                    'placeholder' => 'Select the academic year...',
            ])
            ->add('center', EntityType::class, [
                'class' => 'AppBundle\Entity\K12Center',
                'placeholder' => 'Select a MESA center...',
            ])
            ->add('activities', EntityType::class, [
                'class' => 'AppBundle\Entity\Activity',
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('school', null, [
                'placeholder' => 'Select a school...',
                'attr' => [
                    'class' => 'select2'
                ]
            ])
            ->add('teacher', EntityType::class, [
                'placeholder' => 'Select a teacher...',
                'class' => 'AppBundle\Entity\Teacher',
                'attr' => [
                    'class' => 'select2'
                ],
                'required' => false
            ])
            ->add('grade', null, [
                'placeholder' => 'Select a grade...',
            ])
            ->add('GPA', null, [
                'required' => false,
            ])
            ->add('mathCourse', EntityType::class, [
                'placeholder' => 'Select a math course...',
                'class' => 'AppBundle\Entity\StateCourse',
                'required' => false,
                'query_builder' => function (StateCourseRepository $scr) {
                    return $scr->getMathClasses();
                }
            ])
            ->add('scienceCourse', EntityType::class, [
                'placeholder' => 'Select a science course...',
                'class' => 'AppBundle\Entity\StateCourse',
                'required' => false,
                'query_builder' => function (StateCourseRepository $scr) {
                    return $scr->getScienceClasses();
                }
            ])
            ->add('englishCourse', EntityType::class, [
                'placeholder' => 'Select an english course...',
                'class' => 'AppBundle\Entity\StateCourse',
                'required' => false,
                'query_builder' => function (StateCourseRepository $scr) {
                    return $scr->getEnglishClasses();
                }
            ])
            ->add('PSAT', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('SAT', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('ACT', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('collegeGoal', ChoiceType::class, [
                'placeholder' => 'Select one...',
                'choices' => [
                    'Community/Technical' => 'Community/Technical',
                    'Washington Public 4 year College/University' => 'Washington Public 4 year College/University',
                    'Washington Private College or Univeristy' => 'Washington Private College or University',
                    'Out of State School' => 'Out of State School'
                ],
                'required' => false,
            ])
            ->add('careers', EntityType::class, [
                'class' => 'AppBundle\Entity\CareerCluster',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
            ]);
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\K12AIF',
            'student' => null
        ]);
    }
}