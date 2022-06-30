<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('firstname', EntityType::class, [
                'class' => User::class,
                'autocomplete' => true,
                'choice_label' => 'firstname',
                'label' => 'Teammates',
                'multiple' => true,
              

            ])
            // ->add('lastname', EntityType::class, [
            //     'class' => User::class,
            //     'autocomplete' => true,
            //     'choice_label' => 'lastname',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
