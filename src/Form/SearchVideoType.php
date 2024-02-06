<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Section;
use App\Entity\User;
use App\Entity\Video;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVideoType extends AbstractType
{
 /*   public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('file')
            ->add('image')
            ->add('description')
            ->add('datetime')
            ->add('slugVideo')
            ->add('isPublic')
            ->add('users', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('section', EntityType::class, [
                'class' => Section::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', SearchType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
      //      'data_class' => Video::class,
        ]);
    }
}
