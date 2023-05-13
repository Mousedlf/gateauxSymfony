<?php

namespace App\Form;

use App\Entity\Gateau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GateauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('ingredients', CollectionType::class, [
                'entry_type'=>IngredientType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'required'=>true,
                'by_reference'=>false,
                'disabled'=>false,
                'prototype'=>true
            ])
            ->add('images', CollectionType::class, [
                'entry_type'=>ImageType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'required'=>true,
                'by_reference'=>false,
                'disabled'=>false,
                'prototype'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gateau::class,
        ]);
    }
}
