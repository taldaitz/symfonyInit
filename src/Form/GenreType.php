<?php

namespace App\Form;

use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez un titre'],
                'label' => 'Nom'
            ])
            ->add('description', TextareaType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez un titre'],
                'label' => 'Description'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Sauvegarder'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Genre::class,
        ]);
    }
}
