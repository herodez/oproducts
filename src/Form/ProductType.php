<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, array('label' => 'Código'))
            ->add('name', null, array('label' => 'Nombre')) 
            ->add('description', TextareaType::class, array('label' => 'Descripción'))
            ->add('brand', null, array('label' => 'Marca'))
            ->add('category', null, array('label' => 'Categoría'))
            ->add('price', NumberType::class, 
                array('label' => 'Precio', 'invalid_message' => 'El precio debe ser un número válido'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
