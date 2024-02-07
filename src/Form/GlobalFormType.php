<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GlobalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('page', PageType::class, [
                'label' => false,
            ])
            ->add('section', SectionType::class, [
                'label' => false,
            ])
            ->add('pageSection', PageSectionType::class, [
                'label' => false,
            ])
            ->add('type', TypeType::class, [
                'label' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}
