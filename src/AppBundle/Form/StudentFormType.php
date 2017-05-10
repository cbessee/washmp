<?php

namespace AppBundle\Form;

use AppBundle\Entity\Student;
use AppBundle\Entity\State;
use AppBundle\Entity\Race;
use AppBundle\Repository\StudentRepository;
use AppBundle\Repository\StateRepository;
use AppBundle\Repository\RaceRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('middleInitial', null, [
                'required' => false,
            ])
            ->add('lastName')
            ->add('stateStudentID', null, [
            ])
            ->add('districtStudentID', null, [
            ])
            ->add('birthDate', null, [
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'html5' => false,
                'attr' => [
                    'class' => 'date-picker',
                    'data-provide' => 'datepicker'
                ]
            ])
            ->add('email', EmailType::class, [

            ])
            ->add('phoneNumber')
            ->add('streetAddress')
            ->add('city')
            ->add('state', null, [
                'placeholder' => 'Select a State...',
            ])
            ->add('zipCode')
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female'
                ],
                'placeholder' => 'Select one...'
            ])
            ->add('ethnicity', ChoiceType::class, [
                'choices' => [
                    'Hispanic or Latino' => 'hispanic',
                    'Not Hispanic or Latino' => 'nonhispanic'
                ],
                'placeholder' => 'Select one...'
            ])
            ->add('race', null, [
                'placeholder' => 'Select a race...',
            ])
            ->add('primaryGuardianFirstName')
            ->add('primaryGuardianMiddleInitial', null, [
                'required' => false,
            ])
            ->add('primaryGuardianLastName')
            ->add('primaryGuardianAddress')
            ->add('primaryGuardianCity')
            ->add('primaryGuardianState', null, [
                'placeholder' => 'Select a State...',
            ])
            ->add('primaryGuardianZipCode')
            ->add('primaryGuardianEmail')
            ->add('primaryGuardianPhone')
            ->add('primaryGuardianOccupation', null, [
                'required' => false,
            ])
            ->add('primaryGuardianEmployer', null, [
                'required' => false,
            ])
            ->add('primaryGuardianIsCollegeGraduate', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('secondaryGuardianFirstName', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianMiddleInitial', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianLastName', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianAddress', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianCity', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianState', null, [
                'placeholder' => 'Select a state...',
                'required' => false,
            ])
            ->add('secondaryGuardianZipCode', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianEmail', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianPhone', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianOccupation', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianEmployer', null, [
                'required' => false,
            ])
            ->add('secondaryGuardianIsCollegeGraduate', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('householdSize')
            ->add('freeReducedLunch', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('homeComputerAccess', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('homeInternetAccess', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ])
            ->add('homeNonEnglishLanguage', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
            ]);
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Student'
        ]);
    }
}