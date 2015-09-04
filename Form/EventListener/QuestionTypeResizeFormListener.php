<?php

namespace MMichel\ExamBundle\Form\EventListener;


use MMichel\ExamBundle\Form\Factory\PolymorphCollectionFormFactory;
use MMichel\ExamBundle\Form\QuestionFormFactory;
use Symfony\Component\Form\Extension\Core\EventListener\ResizeFormListener;
use Symfony\Component\Form\FormEvent;

use Symfony\Component\Form\Exception\UnexpectedTypeException;

class QuestionTypeResizeFormListener extends ResizeFormListener
{
    protected $formFactory;

    public function __construct($type, array $options = array(), $allowAdd = false, $allowDelete = false, $deleteEmpty = false, PolymorphCollectionFormFactory $typeFactory = null)
    {
        parent::__construct($type, $options, $allowAdd, $allowDelete, $deleteEmpty);
        $this->formFactory = $typeFactory;
    }

    protected function setTypeForObject($obj) {
        $this->type = $this->formFactory->getFormForObject($obj);
    }

    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if (null === $data) {
            $data = array();
        }

        if (!is_array($data) && !($data instanceof \Traversable && $data instanceof \ArrayAccess)) {
            throw new UnexpectedTypeException($data, 'array or (\Traversable and \ArrayAccess)');
        }

        // First remove all rows
        foreach ($form as $name => $child) {
            $form->remove($name);
        }

        // Then add all rows again in the correct order
        foreach ($data as $name => $value) {
            $this->setTypeForObject($value);
            $form->add($name, $this->type, array_replace(array(
                'property_path' => '['.$name.']',
            ), $this->options));
        }
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        if (null === $data || '' === $data) {
            $data = array();
        }

        if (!is_array($data) && !($data instanceof \Traversable && $data instanceof \ArrayAccess)) {
            $data = array();
        }

        // Remove all empty rows
        if ($this->allowDelete) {
            foreach ($form as $name => $child) {
                if (!isset($data[$name])) {
                    $form->remove($name);
                }
            }
        }

        // Add all additional rows
        if ($this->allowAdd) {
            foreach ($data as $name => $value) {
                $this->setTypeForObject($value);
                if (!$form->has($name)) {
                    $form->add($name, $this->type, array_replace(array(
                        'property_path' => '['.$name.']',
                    ), $this->options));
                }
            }
        }
    }

}