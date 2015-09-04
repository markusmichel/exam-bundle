<?php

namespace MMichel\ExamBundle\Form;


use MMichel\ExamBundle\Model\QuestionInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\PropertyAccess\Exception\NoSuchIndexException;

class QuestionFormFactory
{

    private $types;

    function __construct()
    {
        $this->types = array();
    }


    /**
     * @param $type
     * @param string $dataClass
     */
    public function addQuestionFormType($type, $dataClass) {
        $this->types[$dataClass] = $type;
    }

    /**
     * @param QuestionInterface $obj
     * @return AbstractType
     */
    public function getFormForObject(QuestionInterface $obj) {
        $class = get_class($obj);
        return $this->getFormForClass($class);
    }

    /**
     * @param $class
     * @return AbstractType
     */
    public function getFormForClass($class) {
        if(array_key_exists($class, $this->types)) {
            return $this->types[$class];
        }

        throw new NoSuchIndexException(
            "No service configured for class " . $class
        );
    }

    public function getDefaultForm() {

    }

}