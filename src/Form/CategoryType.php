<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Nom de la catégorie'
            ]
            ])
            ->add('video', EntityType::class, [
                'label' => 'Choix de la vidéo',
                'class' => Video::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
