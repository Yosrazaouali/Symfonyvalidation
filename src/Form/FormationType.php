<?php

namespace App\Form;

use App\Entity\Formationn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;




class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('idFormateur')
            ->add('dateFor', DateType::class, [
                // renders it as a single text box
                'label' => ' Date formation ',
                'widget' => 'single_text',
                
                'attr' => ['class' => 'message-box form-control', 
                
            ],])  
            ->add('nomFor', TextType::class, [
                'label' => 'Name',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom Formation'],
            ])
            ->add('numbrMaxPer' , ChoiceType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'nombre des paticipant max'],
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    

                ],
                
                
                'preferred_choices' => ['muppets', 'arr'],
                'label' => 'Nombre participant maximal',
            ]
            
            )
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formationn::class,
        ]);
    }
}
