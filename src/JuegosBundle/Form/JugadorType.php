<?php

namespace JuegosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Shootngo\CoreBundle\Entity\UserCategory;

class JugadorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('usuario')
                ->add('nombre')
                ->add('apellidos')
                ->add('juego')
                ->add('especializacion')
                ->add('edad')
                
                ->add($options['boton_enviar'],SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JuegosBundle\Entity\Jugador',
            'boton_enviar' => 'Enviar'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'juegosbundle_jugador';
    }


}
