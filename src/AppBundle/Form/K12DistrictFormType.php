<?php

namespace AppBundle\Form;

use AppBundle\Entity\K12District;
use AppBundle\Entity\K12Center;
use AppBundle\Repository\K12DistrictRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class K12DistrictFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('districtCode')
            ->add('districtName')
            ->add('center');
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\K12District'
        ]);
    }
}