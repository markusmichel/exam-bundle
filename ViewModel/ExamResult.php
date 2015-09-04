<?php

namespace MMichel\ExamBundle\ViewModel;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ExamResult
{
    /** @var integer */
    protected $noQuestions;

    /** @var integer */
    protected $noQuestionsCorrectlyAnswered;

    /** @var integer */
    protected $noQuestionsIncorrectlyAnswered;

    /** @var Collection */
    protected $results;

    /**
     * ExamResult constructor.
     */
    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getNoQuestions()
    {
        return $this->noQuestions;
    }

    /**
     * @param int $noQuestions
     * @return self
     */
    public function setNoQuestions($noQuestions)
    {
        $this->noQuestions = $noQuestions;
        return $this;
    }

    /**
     * @return int
     */
    public function getNoQuestionsCorrectlyAnswered()
    {
        return $this->noQuestionsCorrectlyAnswered;
    }

    /**
     * @param int $noQuestionsCorrectlyAnswered
     * @return self
     */
    public function setNoQuestionsCorrectlyAnswered($noQuestionsCorrectlyAnswered)
    {
        $this->noQuestionsCorrectlyAnswered = $noQuestionsCorrectlyAnswered;
        return $this;
    }

    /**
     * @return int
     */
    public function getNoQuestionsIncorrectlyAnswered()
    {
        return $this->noQuestionsIncorrectlyAnswered;
    }

    /**
     * @param int $noQuestionsIncorrectlyAnswered
     * @return self
     */
    public function setNoQuestionsIncorrectlyAnswered($noQuestionsIncorrectlyAnswered)
    {
        $this->noQuestionsIncorrectlyAnswered = $noQuestionsIncorrectlyAnswered;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param array $result
     * @return self
     */
    public function addResult($result)
    {
        $this->results[] = $result;

        return $this;
    }

    /**
     * @param $result
     * @return self
     */
    public function removeResult($result) {
        $this->results->removeElement($result);
        return $this;
    }

}