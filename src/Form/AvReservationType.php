<?php

namespace App\Form;

use App\Entity\AvReservation;
use App\Entity\AvReservationStatut;
use App\Entity\AvVoyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('tel')
            ->add('message')
            ->add('VoyageAReservation', EntityType::class, [
                'class' => AvVoyage::class,
                'choice_label' => 'id',
            ])
            ->add('AvReservationStatut', EntityType::class, [
                'class' => AvReservationStatut::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AvReservation::class,
        ]);
    }
}
