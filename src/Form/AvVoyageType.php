<?php

namespace App\Form;

use App\Entity\AvCategorie;
use App\Entity\AvImage;
use App\Entity\AvPays;
use App\Entity\AvVoyage;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvVoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add('debut', null, [
                'widget' => 'single_text',
            ])
            ->add('fin', null, [
                'widget' => 'single_text',
            ])
            ->add('AvCategorie', EntityType::class, [
                'label' => 'Categorie',
                'class' => AvCategorie::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('AvPays', EntityType::class, [
                'label' => 'Pays',
                'class' => AvPays::class,
                'choice_label' => 'nom',
            ])
            ->add('AvImage', EntityType::class, [
                'label' => 'Image',
                'class' => AvImage::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AvVoyage::class,
        ]);
    }
}
