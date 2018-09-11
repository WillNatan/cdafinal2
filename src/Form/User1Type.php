<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label'=>'Prénom'))
            ->add('name', TextType::class, array('label'=>'Nom'))
            ->add('birthday', BirthdayType::class, array('label'=>'Date de naissance','widget' => 'single_text'))
            ->add('username', TextType::class, array('label'=>'Pseudo'))
            ->add('email', EmailType::class, array('label'=>'Adresse Email'))
            ->add('numeroFix', TextType::class, array('label'=>'Numéro de téléphone fixe'))
            ->add('numeroPortable', TextType::class, array('label'=>'Portable'))
            ->add('adresse1', TextType::class, array('label'=>'Adresse 1'))
            ->add('adresse2', TextType::class, array('label'=>'Adresse 2'))
            ->add('adresseComplement', TextType::class, array('label'=>'Adresse complémentaire'))
            ->add('numeroAppartement', TextType::class, array('label'=>"Numéro d'appartement"))
            ->add('codePostal', TextType::class, array('label'=>'Code postal'))
            ->add('ville', TextType::class, array('label'=>'Ville'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Répétez votre mot de passe'),
            ))
            ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
