<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

<<<<<<< HEAD
    
    public function configureFields(string $pageName): iterable
    {
        return [
        
            AssociationField::new('objet'),
            AssociationField::new('borrower'),
            Datefield::new('starting_date'),
            DateField::new('ending_date'),
        ];
    }
    
=======
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('objet'),
            AssociationField::new('borrower'),
            DateField::new('starting_date'),
            DateField::new('ending_date')
        ];
    }
>>>>>>> 7fbbe1eab58f3aada36c7945795b715a13da3af8
}
