<?php

namespace AppBundle\Form;

use AppBundle\Entity\K12Center;
use AppBundle\Repository\K12CenterRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class K12CenterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('centerName')
            ->add('centerAbbr');
    }

    public function  configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\K12Center'
        ]);
    }
}