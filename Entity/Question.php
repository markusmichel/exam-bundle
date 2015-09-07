<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * Question
 */
class Question implements QuestionInterface
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
     * @var string
     */
    protected $additionalText;

    /**
     * The time at which the user answered this question.
     * Subtypes should automatically set this value when adding/setting an answer.
     *
     * @var \DateTime
     */
    protected $answeredAt;

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
     * @return Question
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
     * Set additionalText
     *
     * @param string $additionalText
     * @return Question
     */
    public function setAdditionalText($additionalText)
    {
        $this->additionalText = $additionalText;

        return $this;
    }

    /**
     * Get additionalText
     *
     * @return string 
     */
    public function getAdditionalText()
    {
        return $this->additionalText;
    }

    /**
     * Returns all possible answers.
     * Returns empty collection. Should be implemented by subtypes like MutlipleChoiceQuestion or SingleChoiceQuestion.
     *
     * @return ArrayCollection
     */
    public function getAnswers()
    {
        return new ArrayCollection();
    }

    /**
     * Gets the time at when the user has answered the question
     *
     * @return \DateTime
     */
    public function getAnsweredAt()
    {
        return $this->answeredAt;
    }

    /**
     * Sets the time at when the user has answered the question
     *
     * @param \DateTime $answeredAt
     * @return self
     */
    public function setAnsweredAt(\DateTime $answeredAt = null)
    {
        $this->answeredAt = $answeredAt;

        return $this;
    }
}
