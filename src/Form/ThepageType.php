<?php

namespace App\Form;

use App\Entity\Thepage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThepageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('thetitle')
            ->add('thelongtext')
            ->add('thetime')
            ->add('authorauthor')
            ->add('thesectionthesection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thepage::class,
        ]);
    }
}
