<?php

namespace App\Form;

use App\Entity\Category;
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

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('file', FileType::class, [
                'label' => 'Video (Video file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2000000k',
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
            ->add('image', FileType::class, [
                'label' => 'Image (Image file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/bmp',
                            'image/svg+xml',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ]),
                ]
            ])
            ->add('description', TextType::class)
            ->add('isPublic', CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
