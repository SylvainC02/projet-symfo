<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('starting_date', DateType::class, [
<<<<<<< HEAD
                
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr'=> ['class'=>'js-datepicker'],
                    'label'=> "Date de debut"
                
                    
                    
            ])
=======
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
                'label' => "Date de début"

            ])
            ->add('ending_date', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker2'],
                'label' => "Date de fin"
            ]);
    }
>>>>>>> 0caf76c08840237ec0239e8a706ec418722a2d77

            ->add('ending_date', DateType::class, [
                
                'widget' => 'single_text',
                'html5' => false,
                'attr'=> ['class'=>'js-datepicker2'],
                'label'=> "Date de fin"
            
                
                
            ]);
    
        }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
