<?php

namespace App\Form;

use App\Entity\PageSection;
use App\Entity\Section;
use App\Entity\Type;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('slugSection')
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'id',
            ])
            ->add('videos', EntityType::class, [
                'class' => Video::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('pageSection', EntityType::class, [
                'class' => PageSection::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Section::class,
        ]);
    }
}
