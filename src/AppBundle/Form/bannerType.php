<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class bannerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('orden', IntegerType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Orden de Prioridad'))
            ->add('textonees', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Superior Español'))
            ->add('textoneen', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Superior Ingles'))
            ->add('textonede', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Superior Aleman'))
            ->add('texttwoes', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Inferior Español'))
            ->add('texttwoen', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Inferior Ingles'))
            ->add('texttwode', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Texto Inferior Aleman'))
            ->add('fulles', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Completo Español'))
            ->add('fullen', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Completo Ingles'))
            ->add('fullde', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Texto Completo Aleman'))
            ->add('file', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\banner'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_banner';
    }


}
