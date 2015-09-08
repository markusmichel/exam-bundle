<?php

namespace MMichel\ExamBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Model\AbstractQuestionTemplate;
use MMichel\ExamBundle\Model\QuestionInterface;

/**
 * Exam
 */
class Exam extends AbstractQuestionTemplate
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Collection
     */
    protected $questions;

    // @todo implement schema
    protected $started;

    // @todo implement schema
    protected $completed;

    /**
     * Constructor
     *
     * @todo: Examen müssen vorgerfertigt sein können und können demnach nicht direkt beantwortet werden - sie müssen vorher erst geklont werden.
     * Em muss also eine Property geben welche besagt, ob das Examen ein "Template" ist oder nicht.
     * Alternativ gibt es zwei klassen z.B. "Exam" und "ExamTemplate". ExamTemplate könnte das Template im Konstruktor übergeben bekommen.
     *
     * @todo: Beim klonen die Antworten der Fragen zurücksetzen?
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->questions = new ArrayCollection();
    }

    function __clone()
    {
        if($this->id) {
            parent::__clone();
            $this->id = null;
            $this->isTemplate = false;

            if($this->questions !== null) {
                $clonedQuestions = new ArrayCollection();
                foreach($this->questions as $question) {
                    $clonedQuestions[] = clone $question;
                }

                $this->questions = $clonedQuestions;
            }
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
     * Add questions
     *
     * @param Question $question
     * @return Exam
     */
    public function addQuestion(Question $question)
    {
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
