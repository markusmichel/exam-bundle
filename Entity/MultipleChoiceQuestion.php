<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\MultipleChoiceQuestionInterface;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * MultipleChoiceQuestion
 */
class MultipleChoiceQuestion extends Question implements QuestionInterface, MultipleChoiceQuestionInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $answers;

    /**
     * @var ArrayCollection
     */
    protected $actualAnswers;

    function __construct()
    {
        $this->answers          = new ArrayCollection();
        $this->actualAnswers    = new ArrayCollection();
    }

    /**
     * Reset id.
     * Remove all answers and add a clone for each answer again.
     */
    function __clone()
    {
        $this->id = null;

        if($this->answers !== null) {
            $answers = new ArrayCollection();
            /** @var MultipleChoiceAnswer $answer */
            foreach($this->answers as $answer) {
                $clonedAnswer = clone $answer;
                $clonedAnswer->setQuestion($this);
                $answers->add($clonedAnswer);
            }

            $this->answers = $answers;
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
     * Add answers
     *
     * @param MultipleChoiceAnswer $answers
     * @return MultipleChoiceQuestion
     */
    public function addAnswer(MultipleChoiceAnswer $answers)
    {
        $this->setAnsweredAt(new \DateTime());
        $answers->setQuestion($this);
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param MultipleChoiceAnswer $answers
     * @return self
     */
    public function removeAnswer(MultipleChoiceAnswer $answers)
    {
        $this->answers->removeElement($answers);
        $answers->setQuestion(null);

        return $this;
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @return ArrayCollection
     */
    public function getActualAnswers()
    {
        return $this->actualAnswers;
    }

    public function addActualAnswer(MultipleChoiceAnswer $answer) {
        $answer->setQuestionForSelectedAnswer($this);
        $this->actualAnswers[] = $answer;

        return $this;
    }

    public function removeActualAnswer(MultipleChoiceAnswer $answer) {
        $answer->setQuestionForSelectedAnswer(null);
        $this->actualAnswers->removeElement($answer);

        return $this;
    }
}
