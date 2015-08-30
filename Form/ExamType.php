<?php

namespace MMichel\ExamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questions', 'collection', array(
                'type'  => new QuestionType(),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MMichel\ExamBundle\Entity\Exam',
            'validation_groups' => array('test'),
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'exam';
    }
}
