<?php

namespace MMichel\ExamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SingleChoiceQuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('correctAnswer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\SingleChoiceQuestion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mmichel_exambundle_singlechoicequestion';
    }
}
