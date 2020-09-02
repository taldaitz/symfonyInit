<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez un titre'],
                'label' => 'Titre'
            ])
            ->add('publicationDate', DateType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
                'label' => 'Date Publication',
                'html5' => true,
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('pageNb', NumberType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
                'html5' => true,
                'label' => 'Nombre de page'
            ])
            ->add('editor', ChoiceType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
                'label' => 'Editeur',
                'choices' => [
                    'Hachette' => 'hachette',
                    'Flammarion' => 'flammarion',
                    'Folio' => 'folio',
                ]
            ] )
            ->add('genre', EntityType::class, [
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
                'label' => 'Genre',
                'class' => Genre::class,
                'choice_label' => 'name'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
