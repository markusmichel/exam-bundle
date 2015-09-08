<?php

namespace MMichel\ExamBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Entity\ExamQuestion;
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


        $singleChoiceQuestion = new SingleChoiceQuestion();
        $singleChoiceQuestion->setText("Sample multiple choice question");
        $singleChoiceQuestion->setAdditionalText("Which is the best team in the world?");

        $singleChoiceAnswer1 = new SingleChoiceAnswer();
        $singleChoiceAnswer1->setText("Borussia Dortmund");
        $singleChoiceAnswer1->setIsCorrect(false);

        $singleChoiceAnswer2 = new SingleChoiceAnswer();
        $singleChoiceAnswer2->setText("Real Madrid");
        $singleChoiceAnswer2->setIsCorrect(false);

        $singleChoiceAnswer3 = new SingleChoiceAnswer();
        $singleChoiceAnswer3->setText("FC Bayern München");
        $singleChoiceAnswer3->setIsCorrect(true);

        $singleChoiceQuestion->setCorrectAnswer($singleChoiceAnswer3);
        $singleChoiceQuestion->addIncorrectAnswer($singleChoiceAnswer1);
        $singleChoiceQuestion->addIncorrectAnswer($singleChoiceAnswer2);


        $multipleChoiceQuestion = new MultipleChoiceQuestion();
        $multipleChoiceQuestion->setText("Another sample multiple choice question");
        $multipleChoiceQuestion->setAdditionalText("Which players are from Germany?");

        $multipleChoiceAnswer1 = new MultipleChoiceAnswer();
        $multipleChoiceAnswer1->setText("Franck Ribery");
        $multipleChoiceAnswer1->setIsCorrect(false);

        $multipleChoiceAnswer2 = new MultipleChoiceAnswer();
        $multipleChoiceAnswer2->setText("Thomas Müller");
        $multipleChoiceAnswer2->setIsCorrect(true);

        $multipleChoiceAnswer3 = new MultipleChoiceAnswer();
        $multipleChoiceAnswer3->setText("Bastian Schweinsteiger");
        $multipleChoiceAnswer3->setIsCorrect(true);

        $multipleChoiceAnswer4 = new MultipleChoiceAnswer();
        $multipleChoiceAnswer4->setText("Arjen Robben");
        $multipleChoiceAnswer4->setIsCorrect(false);

        $multipleChoiceQuestion->addAnswer($multipleChoiceAnswer1);
        $multipleChoiceQuestion->addAnswer($multipleChoiceAnswer2);
        $multipleChoiceQuestion->addAnswer($multipleChoiceAnswer3);
        $multipleChoiceQuestion->addAnswer($multipleChoiceAnswer4);

        $joinTable1 = new ExamQuestion();
        $joinTable1->setExam($exam);
        $joinTable1->setQuestion($multipleChoiceQuestion);

        $joinTable2 = new ExamQuestion();
        $joinTable2->setExam($exam);
        $joinTable2->setQuestion($singleChoiceQuestion);

        $exam->addQuestion($joinTable1);
        $exam->addQuestion($joinTable2);
        $manager->persist($joinTable1);
        $manager->persist($joinTable2);

        $manager->persist($exam);

        $manager->flush();
    }
}