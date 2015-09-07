<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\AnswerInterface;
use MMichel\ExamBundle\Model\QuestionInterface;
use MMichel\ExamBundle\Model\SingleChoiceAnswerInterface;
use MMichel\ExamBundle\Model\SingleChoiceQuestionInterface;

/**
 * SingleChoiceQuestion
 */
class SingleChoiceQuestion extends Question implements SingleChoiceQuestionInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var AnswerInterface
     */
    protected $correctAnswer;

    /**
     * @var Collection
     */
    protected $incorrectAnswers;

    /**
     * @var Collection
     */
    protected $actualAnswers;

    /**
     * User selcted answer.
     *
     * @var SingleChoiceAnswerInterface
     */
    protected $actualAnswer;

    function __construct()
    {
        $this->incorrectAnswers = new ArrayCollection();
    }

    function __clone()
    {
        if($this->id) {
            $this->id = null;
        }
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
     * Returns the ONLY! correct answer for this question.
     *
     * @return AnswerInterface
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }

    /**
     * Sets the ONLY! correct answer for this question.
     *
     * @param AnswerInterface $answer
     * @return self
     */
    public function setCorrectAnswer(AnswerInterface $answer = null)
    {
        $this->setAnsweredAt(new \DateTime());
        $this->correctAnswer = $answer;

        return $this;
    }

    /**
     * Gets a list of incorrect answers for this question.
     *
     * @return Collection
     */
    public function getIncorrectAnswers()
    {
        return $this->incorrectAnswers;
    }

    /**
     * Adds an incorrect answer to the list of incorrect answers.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function addIncorrectAnswer(SingleChoiceAnswerInterface $answer)
    {
        $this->setAnsweredAt(new \DateTime());
        $this->incorrectAnswers[] = $answer;

        return $this;
    }

    /**
     * Removes an incorrect answer from the list f incorrect answers.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function removeIncorrectAnswer(SingleChoiceAnswerInterface $answer)
    {
        $this->incorrectAnswers->removeElement($answer);
    }

    /**
     * Returns all possible answers.
     *
     * @return ArrayCollection
     */
    public function getAnswers()
    {
        $answers = new ArrayCollection($this->getIncorrectAnswers()->toArray());
        if($this->correctAnswer !== null) $answers->add($this->correctAnswer);

        return $answers;
    }

    /**
     * Sets the actual (user selected) answer.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function setActualAnswer(SingleChoiceAnswerInterface $answer)
    {
        $this->actualAnswer = $answer;

        return $this;
    }

    /**
     * Gets the actual (user selected) answer or null.
     *
     * @return SingleChoiceAnswerInterface
     */
    public function getActualAnswer()
    {
        return $this->actualAnswer;
    }
}
