<?php

namespace MMichel\ExamBundle\Form;

use Doctrine\Common\Collections\Collection;
use MMichel\ExamBundle\Model\MultipleChoiceQuestionInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MultipleChoiceQuestionTestType extends QuestionType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event) {
            $form = $event->getForm();
            /** @var MultipleChoiceQuestionInterface $question */
            $question = $event->getData();

            $form->add("actualAnswers", "entity", array(
                'class'     => 'MMichel\ExamBundle\Entity\MultipleChoiceAnswer',
                'choices'   => $question->getAnswers(),
                'multiple'  => true,
                'expanded'  => true,
            ));
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\MultipleChoiceQuestion',
            'validation_groups' => array('test'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exam_multiple_choice_question_test';
    }
}
