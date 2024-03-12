<?php

namespace App\Controller\Admin;

use App\Entity\CmsActualites;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CmsActualitesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CmsActualites::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
