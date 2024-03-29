<?php

namespace MMichel\ExamBundle\Model;


interface AnswerInterface
{
    /**
     * Gets the text (title/content) of the answer.
     *
     * @return string
     */
    public function getText();

    /**
     * Sets the text (title/content) of the answer.
     *
     * @param string $text
     *
     * @return self
     */
    public function setText($text);

    /**
     * Returns true if this answer is/would be the correct answer or one of the correct answers.
     *
     * @return mixed
     */
    public function getIsCorrect();

    /**
     * Sets if this answer is correct or not.
     *
     * @param boolean $isCorrect
     *
     * @return self
     */
    public function setIsCorrect($isCorrect);

}