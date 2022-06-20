<?php

namespace App\Form;

use App\Entity\Objet;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
>>>>>>> 0caf76c08840237ec0239e8a706ec418722a2d77
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
            ->add('name')
            ->add('image')
            ->add('description')
            ->add('categorie')
            
        ;
=======
            ->add('name', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('image', FileType::class, [
                'label' => 'Image : '
            ])
            ->add('description', TextareaType::class, [
                "label" => 'Description : '
            ])
            ->add('categorie');
>>>>>>> 0caf76c08840237ec0239e8a706ec418722a2d77
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objet::class,
        ]);
    }
}
