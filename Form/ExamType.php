<?php

namespace MMichel\ExamBundle\Form;

use MMichel\ExamBundle\Form\Type\PolymorphCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questions', 'collection', array(
                'allow_add'     => false,
                'allow_delete'  => false,
                'type'          => 'exam_question_test',
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
