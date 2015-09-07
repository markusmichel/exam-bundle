<?php

namespace MMichel\ExamBundle\Model;


class AbstractQuestionTemplate implements QuestionTemplateInterface
{

    protected $isTemplate;

    function __clone()
    {
        $this->isTemplate = false;
    }

    function __construct()
    {
        $this->isTemplate = true;
    }


    /**
     * Sets if the current question/exam etc. is a template.
     * Templates must be cloned before the can be answered by the user.
     *
     * Defaults to true. Set to false on clone.
     *
     * @return boolean
     */
    public function isTemplate()
    {
        return $this->isTemplate;
    }

    /**
     * Sets if the current question/exam etc. is a template.
     * Templates must be cloned before the can be answered by the user.
     *
     * Defaults to true. Set to false on clone.
     *
     * @param boolean $isTemplate
     * @return self
     */
    public function setIsTemplate($isTemplate)
    {
        $this->isTemplate = $isTemplate;
    }
}