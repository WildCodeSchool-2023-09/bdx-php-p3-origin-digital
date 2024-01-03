<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Section;
use App\Entity\User;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('videoFile', FileType::class, [
                'label' => 'Video File',
                'mapped' => false, // Ce champ n'est pas directement lié à la base de données
                'required' => false
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image File',
                'mapped' => false,
                'required' => false
            ])
            ->add('description', TextType::class)
            ->add('isPublic', CheckboxType::class)


            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
