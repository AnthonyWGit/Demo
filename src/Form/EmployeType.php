<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' , TextType::class, [
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('dateDeNaissance', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('dateEmbauche', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('ville' , TextType::class, [
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('favoriteColor', TextType::class, [
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'raisonSociale',
                'attr' => [
                    'class' => 'form-control' #Add Css class to input 
                ]
            ])
            ->add("validate", SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary' #Add Css class to input 
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
