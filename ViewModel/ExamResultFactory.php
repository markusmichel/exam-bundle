<?php

namespace MMichel\ExamBundle\ViewModel;


use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Model\SingleChoiceQuestionInterface;

class ExamResultFactory
{
    public static function create(Exam $exam) {
        $result = new ExamResult();
        $result->setNoQuestions($exam->getQuestions()->count());
        $result->setNoQuestionsCorrectlyAnswered(0);
        $result->setNoQuestionsIncorrectlyAnswered(0);

        foreach($exam->getQuestions() as $question) {
            if($question instanceof SingleChoiceQuestionInterface) {
                if($question->getActualAnswer() === $question->getCorrectAnswer()) {
                    $result->setNoQuestionsCorrectlyAnswered($result->getNoQuestionsCorrectlyAnswered() + 1);
                }
            }
        }


        return $result;
    }
}