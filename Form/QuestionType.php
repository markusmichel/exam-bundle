<?php

namespace MMichel\ExamBundle\Form;

use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Form\Type\ReadOnlyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', new ReadOnlyType(), array(
                'read_only' => true,
                'label'     => false,
            ))
            ->add('additionalText', new ReadOnlyType(), array(
                'read_only' => true,
                'label'     => false,
            ))
        ;

//        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($builder, $options) {
//            /** @var Question $question */
//            $question = $event->getData();
//
//            $type = $this->factory->getFormForObject($question);
//
//            if($type !== null) {
//                $type->buildForm($builder, $options);
//            }
//        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\Question',
            'validation_groups' => array('test'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mmichel_exambundle_question';
    }

}
