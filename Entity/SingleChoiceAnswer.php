<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\AnswerInterface;
use MMichel\ExamBundle\Model\QuestionInterface;
use MMichel\ExamBundle\Model\SingleChoiceAnswerInterface;
use MMichel\ExamBundle\Model\SingleChoiceQuestionInterface;

/**
 * SingleChoiceAnswer
 */
class SingleChoiceAnswer implements SingleChoiceAnswerInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var boolean
     */
    private $isCorrect;

    /**
     * @var SingleChoiceQuestionInterface
     */
    private $question;

    function __clone()
    {
        $this->id = null;
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
     * Gets the text (title/content) of the answer.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text (title/content) of the answer.
     *
     * @param string $text
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Gets the corresponding question.
     *
     * @return SingleChoiceQuestionInterface
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Sets the corresponding question.
     *
     * @param QuestionInterface $question
     *
     * @return self
     */
    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Returns true if this answer is/would be the correct answer or one of the correct answers.
     *
     * @return boolean
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Sets if this answer is correct or not.
     *
     * @param boolean $isCorrect
     *
     * @return self
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }
}
