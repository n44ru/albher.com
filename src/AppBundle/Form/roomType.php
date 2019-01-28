<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class roomType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tituloes', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Habitación Español'))
            ->add('tituloen', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Habitación Ingles'))
            ->add('titulode', TextType::class, array('attr' => array('class' => 'form-control'), 'label'=> 'Título Habitación Aleman'))
            ->add('textoes', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Descripción Español'))
            ->add('textoen', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Descripción Ingles'))
            ->add('textode', TextareaType::class, array('attr' => array('class' => 'form-control textarea'), 'label'=> 'Descripción Aleman'))
            ->add('file1', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file2', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file3', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file4', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file5', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file6', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file7', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file8', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file9', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file10', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file11', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false))
            ->add('file12', FileType::class, array('attr' => array('class' => 'form-control'),'data_class' => null,'required' => false));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\room'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_room';
    }


}
