<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\DateType ;
=======
use Symfony\Component\Form\Extension\Core\Type\DateType;
>>>>>>> 7fbbe1eab58f3aada36c7945795b715a13da3af8
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('starting_date',DateType::class,[
                'years'=>[ '2022','2023','2024']
                 ] )
            ->add('ending_date', DateType::class,[
                'years'=> ['2022','2023','2024'] 
                ] );
            

        ;
=======
            ->add('starting_date', DateType::class, [
                'years' => ['2022', '2023', '2024']
            ])
            ->add('ending_date', DateType::class, [
                'years' => ['2022', '2023', '2024']
            ]);
>>>>>>> 7fbbe1eab58f3aada36c7945795b715a13da3af8
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
