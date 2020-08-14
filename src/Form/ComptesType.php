<?php

namespace App\Form;

use App\Entity\Comptes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComptesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type_compte')
            ->add('numero_agence')
            ->add('numero_compte')
            ->add('cle_rib')
            ->add('frais_ouverture')
            ->add('_cni')
            ->add('_ninea')
            ->add('clientsEntreprises')
            ->add('clientsParticuliers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comptes::class,
        ]);
    }
}
