<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\MultipleChoiceAnswerInterface;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * MultipleChoiceAnswer
 */
class MultipleChoiceAnswer implements MultipleChoiceAnswerInterface
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
     * @var MultipleChoiceQuestion
     */
    private $question;

    /**
     * @var MultipleChoiceQuestion
     */
    private $questionForSelectedAnswer;

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

    /**
     * Set question
     *
     * @param QuestionInterface $question
     * @return MultipleChoiceAnswer
     */
    public function setQuestion(QuestionInterface $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \MMichel\ExamBundle\Entity\MultipleChoiceQuestion 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns true if this answer is/would be the correct answer or one of the correct answers.
     *
     * @return mixed
     */
    public function getIsCorrectAnswer()
    {

    }

    /**
     * @return MultipleChoiceQuestion
     */
    public function getQuestionForSelectedAnswer()
    {
        return $this->questionForSelectedAnswer;
    }

    /**
     * @param MultipleChoiceQuestion $questionForSelectedAnswer
     */
    public function setQuestionForSelectedAnswer($questionForSelectedAnswer)
    {
        $this->questionForSelectedAnswer = $questionForSelectedAnswer;
    }


}
