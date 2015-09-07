<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\MultipleChoiceAnswerInterface;
use MMichel\ExamBundle\Model\MultipleChoiceQuestionInterface;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * MultipleChoiceAnswer
 */
class MultipleChoiceAnswer implements MultipleChoiceAnswerInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var boolean
     */
    protected $isCorrect;

    function __construct()
    {
        $this->isCorrect = false;
    }

    function __clone()
    {
        if($this->id) {
            $this->id = null;
        }
    }

    function __toString()
    {
        return $this->getText();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return MultipleChoiceAnswer
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set isCorrect
     *
     * @param boolean $isCorrect
     * @return MultipleChoiceAnswer
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean 
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }
}
