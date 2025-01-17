<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use VictorPrdh\RecaptchaBundle\Form\ReCaptchaType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class UserPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'first_options' => [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ],
            'second_options' => [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Confirmation du mot de passe',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ],
            'invalid_message' => 'Les mots de passe ne correspondent pas'
        ])

        ->add('newPassword', RepeatedType::class, [  
            'type' => PasswordType::class,
            'first_options' => [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nouveau mot de passe',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ],
            'second_options' => [
                'attr' => [
                    'class' => 'form-control mb-4'
                ],
                'label' => 'Confirmation du nouveau mot de passe',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ],
            'invalid_message' => 'Les nouveaux mots de passe ne correspondent pas'
        ])  

        ->add("recaptcha", ReCaptchaType::class, [
            'label_attr' => [
                'class' => 'form-label mt-4'
            ],
        ])

        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'buttonbuttonmodif mt-4 mb-4'
            ],
            'label' => 'Changer mon mot de passe'
        ]);
    }
}