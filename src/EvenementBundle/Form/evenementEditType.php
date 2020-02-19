<?php

namespace EvenementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\Theme;

class evenementEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEvenement',TextareaType::class)
            ->add('theme',EntityType::class, [
                // looks for choices from this entity
                'class' => \EvenementBundle\Entity\Theme::class,
                'choice_label' => 'nom',
                'required'=>true,
                'placeholder' => 'Choose a Theme',
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('description',TextareaType::class)
            ->add('date',DateType::class, [
            'widget' => 'single_text',
            // this is actually the default format for single_text
            'format' => 'yyyy-MM-dd',
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EvenementBundle\Entity\evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'evenementbundle_evenement';
    }


}
