<?php

namespace AppBundle\Form;

use AppBundle\Entity\K12School;
use AppBundle\Repository\K12SchoolRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class K12SchoolFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schoolName')
            ->add('schoolID')
            ->add('district');
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\K12School'
        ]);
    }
}