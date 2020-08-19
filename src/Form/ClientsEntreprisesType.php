<?php

namespace App\Form;

use App\Entity\ClientsEntreprises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsEntreprisesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statut')
            ->add('denomination')
            ->add('ninea')
            ->add('adresse')
            ->add('telephone')
            ->add('mail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientsEntreprises::class,
        ]);
    }








    
}
