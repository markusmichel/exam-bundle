<?php

namespace MMichel\ExamBundle\Model;


use Doctrine\Common\Collections\Collection;

interface SingleChoiceQuestionInterface extends QuestionInterface
{
    /**
     * Returns the ONLY! correct answer for this question.
     *
     * @return AnswerInterface
     */
    public function getCorrectAnswer();

    /**
     * Sets the ONLY! correct answer for this question.
     *
     * @param AnswerInterface $answer
     * @return self
     */
    public function setCorrectAnswer(AnswerInterface $answer);

    /**
     * Gets a list of incorrect answers for this question.
     *
     * @return Collection
     */
    public function getIncorrectAnswers();

    /**
     * Adds an incorrect answer to the list of incorrect answers.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function addIncorrectAnswer(SingleChoiceAnswerInterface $answer);

    /**
     * Removes an incorrect answer from the list f incorrect answers.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function removeIncorrectAnswer(SingleChoiceAnswerInterface $answer);

    /**
     * Sets the actual (user selected) answer.
     *
     * @param SingleChoiceAnswerInterface $answer
     * @return self
     */
    public function setActualAnswer(SingleChoiceAnswerInterface $answer);

    /**
     * Gets the actual (user selected) answer or null.
     *
     * @return SingleChoiceAnswerInterface
     */
    public function getActualAnswer();
}