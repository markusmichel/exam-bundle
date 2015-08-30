<?php

namespace MMichel\ExamBundle\Form;

use MMichel\ExamBundle\Model\MultipleChoiceQuestionInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultipleChoiceQuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('additionalText', null, array(
                'required'  => false,
            ))
            ->add('answers', 'collection', array(
                'type'          => new MultipleChoiceAnswerType(),
                'allow_add'     => true,
                'allow_delete'  => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\MultipleChoiceQuestion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exam_multiple_choice_question';
    }
}
