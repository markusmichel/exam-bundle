<?php

namespace MMichel\ExamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SingleChoiceAnswerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('isCorrect')
            ->add('question')
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\SingleChoiceAnswer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mmichel_exambundle_singlechoiceanswer';
    }
}
