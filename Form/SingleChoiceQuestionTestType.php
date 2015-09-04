<?php

namespace MMichel\ExamBundle\Form;

use MMichel\ExamBundle\Model\SingleChoiceQuestionInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SingleChoiceQuestionTestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event) {
            $form = $event->getForm();
            /** @var SingleChoiceQuestionInterface $question */
            $question = $event->getData();

            $form->add("actualAnswer", "entity", array(
                'class'     => 'MMichel\ExamBundle\Entity\SingleChoiceAnswer',
                'choices'   => $question->getAnswers(),
                'multiple'  => false,
                'expanded'  => true,
            ));
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\SingleChoiceQuestion',
            'validation_groups' => array('test'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mmichel_exambundle_single_choiceq_uestion_test';
    }
}
