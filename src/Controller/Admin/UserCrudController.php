<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
<<<<<<< HEAD
=======
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

<<<<<<< HEAD
    
    public function configureFields(string $pageName): iterable
    {
        return [
        
            TextField::new('email'),
            TextField::new('pseudo'),
=======
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo'),
            EmailField::new('email'),
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
            ArrayField::new('roles'),
            TextareaField::new('adress'),
            IntegerField::new('total_points'),
            AssociationField::new('objets'),
<<<<<<< HEAD
            AssociationField::new('reservations'),
        ];
    }
    
=======
            AssociationField::new('reservations')
        ];
    }
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
}
