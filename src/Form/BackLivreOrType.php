<?php

namespace App\Form;

use App\Entity\LivreOr;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackLivreOrType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextAreaType::class, array('label'=>'Message ici','attr'=>array('class'=>'form-control', 'rows'=>'10')))
            ->add('date', DateType::class, array('widget' => 'single_text','label'=>"date d'envoi", 'attr'=>array('class'=>'form-control')))
            ->add('statut',ChoiceType::class, array('label'=>'Statut',
        'choices'  => array(
            'Maybe' => null,
            'Activé' => true,
            'Desactivé' => false,
        ),'attr'=>array('style'=>'margin-top:15px;')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LivreOr::class,
        ]);
    }
}
