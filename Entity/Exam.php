<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Entity\Question;

/**
 * Exam
 */
class Exam
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Collection
     */
    private $questions;

    // @todo implement schema
    private $started;

    // @todo implement schema
    private $completed;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * Add questions
     *
     * @param Question $question
     * @return Exam
     */
    public function addQuestion(Question $question)
    {
        $question->setExam($this);
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param Question $question
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
