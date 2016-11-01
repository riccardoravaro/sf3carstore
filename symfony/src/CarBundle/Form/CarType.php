<?php

namespace CarBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
        ->add('description')
        ->add('price', TextType::class , [ 'required' => true ])
        ->add('year', DateType::class , [
            'required' => true,
            'widget' => 'choice',
             'years' => range( '1992', date('y'))
            ])
        ->add('make', EntityType::class, [ 'required' => true, 'class' => 'CarBundle\Entity\Make'])
        ->add('model', EntityType::class, ['required' => true, 'class' => 'CarBundle\Entity\Model']);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'carbundle_car';
    }


}
