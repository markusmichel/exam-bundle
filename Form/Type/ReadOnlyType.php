<?php

namespace MMichel\ExamBundle\Form\Type;


use Symfony\Component\Form\AbstractType;

class ReadOnlyType extends AbstractType
{
    public function getParent()
    {
        return 'text';
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'readonly';
    }
}