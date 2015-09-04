<?php

namespace MMichel\ExamBundle\Tests\Model;


use Doctrine\Common\Collections\Collection;
use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;

class ExamTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId() {
        $exam = new Exam();
        $this->assertNull($exam->getId());
    }

    public function testQuestionsInitializedState() {
        $exam = new Exam();
        $this->assertTrue($exam->getQuestions() instanceof Collection);
    }

    public function testAddQuestion() {
        $exam = new Exam();

        $exam->addQuestion(new Question());
        $this->assertNotNull($exam->getQuestions());
        $this->assertTrue($exam->getQuestions() instanceof Collection);
        $this->assertEquals(1, $exam->getQuestions()->count());
    }

    public function testAddPolymorphicQuestions() {
        $exam = new Exam();
        $question1 = new Question();
        $question2 = new SingleChoiceQuestion();
        $question3 = new MultipleChoiceQuestion();

        $exam->addQuestion($question1);
        $exam->addQuestion($question2);
        $exam->addQuestion($question3);

        $this->assertEquals(3, $exam->getQuestions()->count());

        $this->assertTrue($exam->getQuestions()->contains($question1));
        $this->assertTrue($exam->getQuestions()->contains($question2));
        $this->assertTrue($exam->getQuestions()->contains($question3));
    }

    public function testRemoveQuestion() {
        $exam = new Exam();
        $question = new Question();

        $exam->addQuestion($question);
        $this->assertEquals(1, $exam->getQuestions()->count());
        $exam->removeQuestion($question);
        $this->assertEquals(0, $exam->getQuestions()->count());
    }

}
