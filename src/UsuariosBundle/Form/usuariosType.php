<?php

namespace UsuariosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class usuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
                ->add('email')
                ->add('roles', ChoiceType::class, array(
                      'attr'  =>  array('class' => 'form-control',
                      'style' => 'margin:5px 0;'),
                      'choices' =>
                      array
                      (
                          'ROLE_ADMIN' => array
                          (
                              'Yes' => 'ROLE_ADMIN',
                          ),
                          'ROLE_TEACHER' => array
                          (
                              'Yes' => 'ROLE_TEACHER'
                          ),
                          'ROLE_STUDENT' => array
                          (
                              'Yes' => 'ROLE_STUDENT'
                          ),
                          'ROLE_PARENT' => array
                          (
                              'Yes' => 'ROLE_PARENT'
                          ),
                      )
                      ,
                      'multiple' => true,
                      'required' => true,
                      )
                  )
                ->add('Actualizar',SubmitType::class);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UsuariosBundle\Entity\usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'usuariosbundle_usuarios';
    }


}
