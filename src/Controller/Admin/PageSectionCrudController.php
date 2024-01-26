<?php

namespace App\Controller\Admin;

use App\Entity\PageSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageSection::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('ordered'),
            CollectionField::new('page'),
            CollectionField::new('section')
        ];
    }
}
