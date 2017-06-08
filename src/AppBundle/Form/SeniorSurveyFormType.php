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

class SeniorSurveyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ratingChoices = [
            'Not At All Satisfied' => 'Not At All Satisfied',
            'Somewhat Satisfied' => 'Somewhat Satisfied',
            'Moderately Satisfied' => 'Moderately Satisfied',
            'Very Satisfied' => 'Very Satisfied',
            'Extremely Satisfied' => 'Extremely Satisfied',
            'Did Not Participate' => 'Did Not Participate',
        ];
        $responseChoices = [
            'Strongly Disagree' => 'Strongly Disagree',
            'Disagree' => 'Disagree',
            'Neutral' => 'Neutral',
            'Agree' => 'Agree',
            'Strongly Agree' => 'Strongly Agree',
            'N/A' => 'N/A'
        ];
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
            ->add('afterSchoolRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('classRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('fieldTripsRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('internshipsRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('juniorSeniorProgramRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('competitionsMesaDayRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('mesaClubRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('mentoringRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('saturdayAcademyRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('sbacEocRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('summerProgramRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('collegeWorkshopRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('financialAidWorkshopRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('satActWorkshopRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('otherActivities', null, [
                'required' => false,
            ])
            ->add('otherActivitiesRating', ChoiceType::class, [
                'choices' => $ratingChoices,
                'expanded' => 'true',
            ])
            ->add('createdPlan', ChoiceType::class, [
                'label' => 'Have you created an academic plan that outlines your path towards college?',
                'expanded' => 'true',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
           ->add('discussedPlan', ChoiceType::class, [
                'label' => 'Have you discussed your academic plan with your parent/guardian?',
                'expanded' => 'true',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('planHelpfullness', ChoiceType::class, [
                'label' => 'How helpful did you find your academic plan in clearly defining your path to college?',
                'expanded' => 'true',
                'choices' => [
                    'Not at all helpful' => 'Not at all helpful',
                    'Somewhat helpful' => 'Somewhat helpful',
                    'Helpful' => 'Helpful',
                    'Very helpful' => 'Vert helpful',
                    'Extremely helpful' => 'Extremely helpful',
                ]
            ])
           ->add('appliedCollege', ChoiceType::class, [
                'label' => 'Have you appled for admission to a 2- or 4-year college, university, or military academy?',
                'expanded' => 'true',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('acceptedCollege', ChoiceType::class, [
                'label' => 'Have you been accepted to any 2- or 4-year college or universities?',
                'expanded' => 'true',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('receivedScholarships', ChoiceType::class, [
                'label' => 'Have you received any scholarships?',
                'expanded' => 'true',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('futurePlans', EntityType::class, [
                'label' => 'What do you plan to do immediately after you finish high school?  (Check all that apply)',
                'class' => 'AppBundle\Entity\FuturePlan',
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('notAttendingReason', ChoiceType::class, [
                'label' => 'If you will not be attending college (2- or 4-year) next year, what is the main reason for your decision?',
                'expanded' => true,
                'choices' => [
                    'Did not apply to school in time' => 'Did not apply to school in time',
                    'Did not apply for financial aid in time' => 'Did not apply for financial aid in time',
                    'College cost/ insufficient financial aid' => 'College cost/ insufficient financial aid',
                    'Need to work full time right now' => 'Need to work full time right now',
                    'Family obligations' => 'Family obligations',
                    'Do not know what I want to study' => 'Do not know what I want to study',
                    'Other' => 'Other'
                ],
                'required' => false,
            ])
            ->add('notAttendingOther', null, [
                'label' => 'If you selected "Other" what is the main reason for your decision?',
                'required' => false,
            ])
            ->add('payingCollege', ChoiceType::class, [
                'label' => 'Paying for college will be a challenge',
                'choices' => $responseChoices,
                'expanded' => 'true',
            ])
            ->add('financialAid', ChoiceType::class, [
                'label' => 'Completing the financial aid process was a challenge',
                'choices' => $responseChoices,
                'expanded' => 'true',
            ])
            ->add('livingAway', ChoiceType::class, [
                'label' => 'Living away from home will be a challenge',
                'choices' => $responseChoices,
                'expanded' => 'true',
            ])
            ->add('parentalSupport', ChoiceType::class, [
                'label' => 'My parents want me to go to college',
                'choices' => $responseChoices,
                'expanded' => 'true',
            ])
            ->add('comments', null, [
                'label' => 'Comments:',
            ]);
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\SeniorSurvey',
            'student' => null
        ]);
    }
}