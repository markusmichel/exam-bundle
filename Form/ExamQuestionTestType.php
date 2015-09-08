<?php

namespace MMichel\ExamBundle\Form;

use MMichel\ExamBundle\Entity\ExamQuestion;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Form\Factory\PolymorphCollectionFormFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamQuestionTestType extends AbstractType
{

    function __construct(PolymorphCollectionFormFactory $formFactory) {

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $form = $event->getForm();
            /** @var ExamQuestion $examQuestion */
            $examQuestion = $event->getData();
            $question = $examQuestion->getQuestion();

            if($question instanceof MultipleChoiceQuestion) {
                $form->add('question', new MultipleChoiceQuestionTestType());
            } elseif($question instanceof SingleChoiceQuestion) {
                $form->add('question', new SingleChoiceQuestionTestType());
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\ExamQuestion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exam_question_test';
    }
}
