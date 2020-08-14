<?php

namespace App\Form;

use App\Entity\ClientsParticuliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsParticuliersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_de_naissance')
            ->add('cni')
            ->add('adresse')
            ->add('telephone')
            ->add('mail')
            ->add('profession')
            ->add('statut')
            ->add('salaire')
            ->add('employeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientsParticuliers::class,
        ]);
    }
}
