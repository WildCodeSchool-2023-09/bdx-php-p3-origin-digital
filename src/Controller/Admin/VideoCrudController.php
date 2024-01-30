<?php

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VideoCrudController extends AbstractCrudController
{
    // use Trait\HiddenButton;

    public static function getEntityFqcn(): string
    {
        return Video::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            SlugField::new('slug_video')->setTargetFieldName('title'),
            ImageField::new('file')
                ->hideOnIndex()
                ->setUploadDir('public/upload/videos/')
                ->setBasePath('upload/videos/'),
            ImageField::new('image')
                ->setUploadDir('public/upload/images/')
                ->setBasePath('upload/images/'),
            TextField::new('description'),
//            DateTimeField::new('datetime')->setTimezone('Europe/Paris'),
            BooleanField::new('is_public'),
        ];
    }
}
