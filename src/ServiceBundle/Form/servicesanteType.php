<?php

namespace ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class servicesanteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('specialite')->add('periodeDispo')->add('lettreMotiv')->add('cv')->add('commentaire');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ServiceBundle\Entity\servicesante'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'servicebundle_servicesante';
    }
    public function configure()
    {
        $this->setWidgets(array(
            'specialite'   => new sfWidgetFormInputText(),
            'commentaire' => new sfWidgetFormTextarea(),
            'file'    => new sfWidgetFormInputFile(),
        ));
        $this->widgetSchema->setNameFormat('hebergement[%s]');

        $this->setValidators(array(
            'specialite'    => new sfValidatorString(array('required' => false)),
            'commentaire' => new sfValidatorString(array('min_length' => 4),array(
                'required'   => 'Le champ message est obligatoire.',
                'min_length' => 'Le message "%value%" est trop court. Il faut au moins %min_length% caractères.',
            )),
        ));
    }


}
