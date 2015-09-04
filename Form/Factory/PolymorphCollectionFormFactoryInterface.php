<?php

namespace MMichel\ExamBundle\Form\Factory;


use Symfony\Component\Form\FormTypeInterface;

interface PolymorphCollectionFormFactoryInterface
{
    /**
     * Returns a form type for the given object.
     *
     * @param $obj
     * @return mixed
     */
    public function getFormForObject($obj);

    /**
     * Return the default form type if `getFormForObject` cant't find a matching type.
     *
     * @return FormTypeInterface
     */
    public function getDefaultForm();
}