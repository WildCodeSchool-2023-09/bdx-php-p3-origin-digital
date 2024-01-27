<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\CategoryType;
use App\Form\PageSectionType;
use App\Form\SectionType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Provider\FieldProvider;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
    {
//       AssociationField::new()

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            CollectionField::new('pageSections')
                ->setEntryType(PageSectionType::class),
//            FormField::addPanel('Je fais un test')
//                ->setFormType(PageSectionType::class),
//            CollectionField::new('pageSections', 'TEST')
//                   // ->setFormType()
//                    ->s('section')->setEntryType(SectionType::class)


                //    ->setValue('pageSection')->setEntryType(PageSectionType::class)
//                ->setEntryType(PageSectionType::class)
//                ->setEntryType(SectionType::class),
//            AssociationField::new('pageSections'),
//            Field::new('')
        ];
    }
}
