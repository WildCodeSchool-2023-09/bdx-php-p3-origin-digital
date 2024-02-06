<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'placeholder' => 'catégorie',
                'choice_label' => 'name',
                'multiple' => true ,
                'expanded' => false ,
                'by_reference' => false ,
                'required' => false,
                'autocomplete' => true
            ])
            ->add('file', DropzoneType::class, [
                'label' => 'vidéo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([ 'maxSize' => '200M',
                        'mimeTypes' => [
                            'video/mp4',
                            'video/webm',
                            'video/ogg',
                            'video/x-msvideo',
                            'video/mov',
                            'video/mpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid video',
                    ]),
                ]
            ])
            ->add('image', DropzoneType::class, [
                'label' => 'image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([ 'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                    ]),
                ]
            ])
            ->add('description', TextType::class)
            ->add('isPublic', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Type de vidéo',
                'choices' => [
                    'Publique' => true,
                    'Privée' => false,
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
