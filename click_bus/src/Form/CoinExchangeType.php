<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CoinExchangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coin', ChoiceType::class, [
                'choices'  => [
                    'USD' => 'USD',
                    'PLN' => 'PLN',
                ],
                'attr' => ['class' => 'form-select'],
                'label_attr' => ['class' => 'input-group-text'],
                'row_attr' => ['class' => 'input-group mb-3'],
                'label' => 'Moneda'
            ])
            ->add('amount', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'input-group-text'],
                'row_attr' => ['class' => 'input-group mb-3'],
                'label' => 'Cantidad'
            ])
            ->add('convert', SubmitType::class, [
                'attr' => ['class' => 'btn btn-dark btn-sm'],
                'label' => 'Convertir'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
