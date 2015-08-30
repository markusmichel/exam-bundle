<?php

namespace MMichel\ExamBundle\Model;


use Doctrine\Common\Collections\ArrayCollection;

interface QuestionInterface
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText($text);

    /**
     * @return string
     */
    public function getAdditionalText();

    /**
     * @param string $text
     *
     * @return self
     */
    public function setAdditionalText($text);

    /**
     * Returns all possible answers.
     *
     * @return ArrayCollection
     */
    public function getAnswers();

    /**
     * Gets the time at when the user has answered the question
     *
     * @return \DateTime
     */
    public function getAnsweredAt();

    /**
     * Sets the time at when the user has answered the question
     *
     * @param \DateTime $answeredAt
     * @return self
     */
    public function setAnsweredAt(\DateTime $answeredAt);
}