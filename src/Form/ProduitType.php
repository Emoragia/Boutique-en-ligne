<?php

namespace App\Form;

use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('stock')
            ->add('price', NumberType::class)
            ->add('image', FileType::class,
                [
                    'required' => false,
                    'mapped' => false, // désactive le mappage avec le champ dans l'entité (qui attend une chaîne de caractère)
                    // ajout des contraintes :
                    'constraints' => [
                        new Image(
                            [
                                "mimeTypesMessage" => "Le format de fichier n'est pas autorisé.",
                                // Seuls les types jpeg et png sont autorisés :
                                "mimeTypes" => ['image/jpeg', 'image/png']
                            ]
                        )
                    ]
                ])
        ->add('genre', ChoiceType::class, [
            'choices'  => [
                'Action' => 'Action',
                'Aventure' => 'Aventure',
                'Comédie' => 'Comédie',
                'Drame' => 'Drame',
                'Fantasy' => 'Fantasy',
                'Science-Fiction' => 'Science-Fiction',
                'Horreur' => 'Horreur',
                'Tranche de vie' => 'Tranche de vie',
                'Romance' => 'Romance',
                'Mystère' => 'Mystère',
                'Surnaturel' => 'Surnaturel',
                'Psychologique' => 'Psychologique',
                'Sport' => 'Sport',
                'École' => 'École ',
                'Super Pouvoirs' => 'Super Pouvoirs',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
