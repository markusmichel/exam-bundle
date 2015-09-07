<?php

namespace MMichel\ExamBundle\Form\Type;


use MMichel\ExamBundle\Form\EventListener\QuestionTypeResizeFormListener;
use MMichel\ExamBundle\Form\Factory\PolymorphCollectionFormFactory;
use MMichel\ExamBundle\Form\QuestionFormFactory;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class PolymorphCollectionType extends CollectionType
{

    protected $formFactory;

    public function __construct(PolymorphCollectionFormFactory $factory) {
        $this->formFactory = $factory;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['allow_add'] && $options['prototype']) {
            $prototype = $builder->create($options['prototype_name'], $options['type'], array_replace(array(
                'label' => $options['prototype_name'].'label__',
            ), $options['options']));
            $builder->setAttribute('prototype', $prototype->getForm());
        }

        $resizeListener = new QuestionTypeResizeFormListener(
            $options['type'],
            $options['options'],
            $options['allow_add'],
            $options['allow_delete'],
            $options['delete_empty'],
            $this->formFactory
        );

        $builder->addEventSubscriber($resizeListener);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'polymorph_collection';
    }
}