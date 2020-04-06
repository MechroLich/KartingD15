<?php

namespace App\Form;

use App\Entity\Laptimes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaptimesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lap1')
            ->add('lap2')
            ->add('lap3')
            ->add('total')
            ->add('finished')
            ->add('user_id')
            ->add('race_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Laptimes::class,
        ]);
    }
}
