<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class servicesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titlees', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Español'))
            ->add('titleen', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Ingles'))
            ->add('titlede', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Aleman'))
            ->add('textes', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Español'))
            ->add('texten', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Ingles'))
            ->add('textde', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Aleman'))
            ->add('reserva', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Se Reserva?'))
            ->add('file1', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file2', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file3', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file4', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\services'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_services';
    }


}
