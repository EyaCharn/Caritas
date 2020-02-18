<?php

namespace ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class hebergementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dureeMax')->add('adresse')->add('nbPlaces')
            ->add('descriptionLogement', TextareaType::class)
            ->add('reglementInterieur', TextareaType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ServiceBundle\Entity\hebergement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'servicebundle_hebergement';
    }
    public function configure()
    {
        $this->setWidgets(array(
            'adresse'   => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormTextarea(),
            'reglementInterieur' => new sfWidgetFormTextarea(),
        ));
        $this->widgetSchema->setNameFormat('hebergement[%s]');

        $this->setValidators(array(
            'adresse'    => new sfValidatorString(array('required' => false)),
            'description' => new sfValidatorString(array('min_length' => 4)),
            'reglementInterieur' => new sfValidatorString(array('min_length' => 4),array(
                'required'   => 'Le champ message est obligatoire.',
                'min_length' => 'Le message "%value%" est trop court. Il faut au moins %min_length% caractères.',
            )),
        ));
    }



}
