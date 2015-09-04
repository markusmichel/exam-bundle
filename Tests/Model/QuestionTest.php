<?php

namespace MMichel\ExamBundle\Tests\Model;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\Question;

class QuestionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return Question
     */
    protected function getQuestion() {
//        return $this->getMock("MMichel\\ExamBundle\\Entity\\Question");
        return new Question();
    }

    public function testGetId() {
        $question = $this->getQuestion();
        $this->assertNull($question->getId());
    }

    public function testTextAndToString() {
        $question = $this->getQuestion();
        $this->assertEmpty($question->__toString());

        $question->setText("Test");
        $this->assertEquals("Test", $question->__toString());
        $this->assertEquals("Test", $question->getText());
    }

    public function testAdditionalText() {
        $question = $this->getQuestion();
        $additionalText = "AdditionalText";

        $this->assertNull($question->getAdditionalText());
        $question->setAdditionalText($additionalText);
        $this->assertEquals($additionalText, $question->getAdditionalText());
    }

    public function testExam() {
        $exam = new Exam();
        $question = $this->getQuestion();

        $this->assertNull($question->getExam());

        $exam->addQuestion($question);
        $this->assertEquals($exam, $question->getExam());

        $question->setExam(null);
        $this->assertNull($question->getExam());
    }

    public function testAnswers() {
        $question = $this->getQuestion();
        $this->assertTrue($question->getAnswers() instanceof Collection);
        $this->assertEquals(0, $question->getAnswers()->count());
    }

    public function testSetAnsweredAt() {
        $question = $this->getQuestion();
        $this->assertNull($question->getAnsweredAt());

        $date = new \DateTime();
        $question->setAnsweredAt($date);
        $this->assertEquals($date, $question->getAnsweredAt());
        $question->setAnsweredAt(null);
        $this->assertNull($question->getAnsweredAt());
    }

}
