<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label'=>'Prénom','attr'=>array('class'=>'form-control')))
            ->add('name', TextType::class, array('label'=>'Nom','attr'=>array('class'=>'form-control')))
            ->add('birthday', BirthdayType::class, array('label'=>'Date de naissance','widget' => 'single_text','attr'=>array('class'=>'form-control')))
            ->add('username', TextType::class, array('label'=>'Pseudo','attr'=>array('class'=>'form-control')))
            ->add('email', EmailType::class, array('label'=>'Adresse Email','attr'=>array('class'=>'form-control')))
            ->add('numeroFix', TextType::class, array('label'=>'Numéro de téléphone fixe','attr'=>array('class'=>'form-control')))
            ->add('numeroPortable', TextType::class, array('label'=>'Portable','attr'=>array('class'=>'form-control')))
            ->add('adresse1', TextType::class, array('label'=>'Adresse 1','attr'=>array('class'=>'form-control')))
            ->add('adresse2', TextType::class, array('label'=>'Adresse 2','attr'=>array('class'=>'form-control')))
            ->add('adresseComplement', TextType::class, array('label'=>'Adresse complémentaire','attr'=>array('class'=>'form-control')))
            ->add('numeroAppartement', TextType::class, array('label'=>"Numéro d'appartement",'attr'=>array('class'=>'form-control')))
            ->add('codePostal', TextType::class, array('label'=>'Code postal','attr'=>array('class'=>'form-control')))
            ->add('ville', TextType::class, array('label'=>'Ville','attr'=>array('class'=>'form-control')))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Répétez votre mot de passe'),
                'options' => array('attr' => array('class' => 'form-control')),))
            ->add('statut',ChoiceType::class, array('label'=>'Statut',
                'choices'  => array(
                    'Activé' => true,
                    'Desactivé' => false,
                ),'attr'=>array('style'=>'margin-top:15px;', 'class'=>'selectpicker')))
            ->add('roles',ChoiceType::class, array('label'=>'Role utilisateur',
                'choices'  => array(
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',


                ),
                'multiple'  => true
            ,'attr'=>array('style'=>'margin-top:15px;', 'class'=>'selectpicker')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
