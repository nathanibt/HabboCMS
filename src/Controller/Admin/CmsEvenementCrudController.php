<?php

namespace App\Controller\Admin;

use App\Entity\CmsEvenement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CmsEvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CmsEvenement::class;
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
