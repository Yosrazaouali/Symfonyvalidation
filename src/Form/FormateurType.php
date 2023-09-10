<?php

namespace App\Form;

use App\Entity\Formateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // Import the TextareaType
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Write your name'],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Last Name',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Write your second last name '],
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control', 'placeholder' => 'exemple@exmple.xxx'],
            ])
            ->add('specialite',ChoiceType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'nombre des paticipant max'],
                'choices' => [
                    'Developement Informatique' => 'Developement Informatique',
                    'Ressorce humaine' => 'Ressorce humaine',
                    'Economie Gestion' => 'Economie Gestion',
                    'Mathematique' => 'Mathematique',
                    'Graphic Design' => 'Graphic Design',
                    'Montage Video' => 'Montage Video',
                   

                ],
                
                
                'preferred_choices' => ['muppets', 'arr'],
                
            ]
            
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formateur::class,
        ]);
    }
}
