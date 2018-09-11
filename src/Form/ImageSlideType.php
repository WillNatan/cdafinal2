<?php

namespace App\Form;

use App\Entity\ImageSlide;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageSlideType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageUrl',FileType::class, array('label' => 'Choisir une image','data_class' => null, 'required'=>false, 'attr'=>array('class'=>'fileinput-new'),'label_attr'=>array('class'=>'m-0 bmd-label-static')))
            ->add('alternative', TextType::class, array('label'=>'Alternative', 'attr'=>array('class'=>'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImageSlide::class,
        ]);
    }
}
