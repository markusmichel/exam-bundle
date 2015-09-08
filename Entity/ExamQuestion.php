<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * ExamQuestion
 *
 * Relation type class for Exam and Questions
 */
class ExamQuestion
{
    /**
     * @var integer
     */
    protected $id;

    /** @var Exam */
    protected $exam;

    /** @var QuestionInterface */
    protected $question;

    /** @var integer */
    protected $position;

    function __clone()
    {
        if($this->id) {
            $this->id = null;
            $this->exam = null;
            if($this->question) $this->question = clone $this->question;
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
     * @return Exam
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * @param Exam $exam
     * @return self
     */
    public function setExam(Exam $exam)
    {
        $this->exam = $exam;
        return $this;
    }

    /**
     * @return QuestionInterface
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param QuestionInterface $question
     * @return self
     */
    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return self
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
}
