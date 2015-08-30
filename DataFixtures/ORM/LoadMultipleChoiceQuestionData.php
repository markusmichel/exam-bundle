<?php

namespace MMichel\ExamBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\SingleChoiceAnswer;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;

class LoadMultipleChoiceQuestionData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $exam = new Exam();


        $question = new SingleChoiceQuestion();
        $question->setText("Sample multiple choice question");
        $question->setAdditionalText("Which is the best team in the world?");

        $answer1 = new SingleChoiceAnswer();
        $answer1->setText("Borussia Dortmund");
        $answer1->setIsCorrect(false);

        $answer2 = new SingleChoiceAnswer();
        $answer2->setText("Real Madrid");
        $answer2->setIsCorrect(false);

        $answer3 = new SingleChoiceAnswer();
        $answer3->setText("FC Bayern München");
        $answer3->setIsCorrect(true);

        $question->setCorrectAnswer($answer1);
        $question->addIncorrectAnswer($answer2);
        $question->addIncorrectAnswer($answer3);

        $exam->addQuestion($question);
        $manager->persist($question);


        $question = new MultipleChoiceQuestion();
        $question->setText("Another sample multiple choice question");
        $question->setAdditionalText("Which players are from Germany?");

        $answer1 = new MultipleChoiceAnswer();
        $answer1->setText("Franck Ribery");
        $answer1->setIsCorrect(false);

        $answer2 = new MultipleChoiceAnswer();
        $answer2->setText("Thomas Müller");
        $answer2->setIsCorrect(true);

        $answer3 = new MultipleChoiceAnswer();
        $answer3->setText("Bastian Schweinsteiger");
        $answer3->setIsCorrect(true);

        $answer4 = new MultipleChoiceAnswer();
        $answer4->setText("Arjen Robben");
        $answer4->setIsCorrect(false);

        $question->addAnswer($answer1);
        $question->addAnswer($answer2);
        $question->addAnswer($answer3);
        $question->addAnswer($answer4);

        $exam->addQuestion($question);
        $manager->persist($question);

        $manager->persist($exam);

        $manager->flush();
    }
}