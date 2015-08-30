<?php

namespace MMichel\ExamBundle\Model;


use Doctrine\Common\Collections\Collection;
use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;

interface MultipleChoiceQuestionInterface extends QuestionInterface
{
    /**
     * Returns a list of both correct and incorrect answers.
     *
     * @return Collection
     */
    public function getAnswers();

    /**
     * Adds a correct or incorrect answer.
     *
     * @param MultipleChoiceAnswer $answer
     * @return mixed
     */
    public function addAnswer(MultipleChoiceAnswer $answer);

    /**
     * Removes a correct of incorrect answer from the list.
     *
     * @param MultipleChoiceAnswer $answer
     * @return mixed
     */
    public function removeAnswer(MultipleChoiceAnswer $answer);
}