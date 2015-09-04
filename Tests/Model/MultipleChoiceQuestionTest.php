<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Model\MultipleChoiceQuestionInterface;
use MMichel\ExamBundle\Model\QuestionInterface;
use MMichel\ExamBundle\Tests\TestMultipleChoiceAnswer;
use MMichel\ExamBundle\Tests\TestMultipleChoiceQuestion;

class MultipleChoiceQuestionTest extends \PHPUnit_Framework_TestCase
{

    /** @var MultipleChoiceQuestion */
    protected $question;

    public function setUp() {
        $this->question = new TestMultipleChoiceQuestion();
    }

    public function testInheritedTypes() {
        $this->assertTrue($this->question instanceof MultipleChoiceQuestionInterface);
        $this->assertTrue($this->question instanceof QuestionInterface);
        $this->assertTrue($this->question instanceof Question);
    }

    public function testClone() {
        $questionId = $answerId = 1;
        $questionText = $answerText = "Test Text";

        $question = new TestMultipleChoiceQuestion();
        $question->setId($questionId);
        $question->setText($questionText);
        $this->assertEquals($questionId, $question->getId());
        $this->assertEquals($questionText, $question->getText());

        $answer = new TestMultipleChoiceAnswer();
        $answer->setId($answerId);
        $this->assertEquals($answerId, $answer->getId());

        $question->addAnswer($answer);

        $clonedQuestion = clone $question;
        $clonedAnswer = $clonedQuestion->getAnswers()->get(0);
        $this->assertNull($clonedQuestion->getId());
        $this->assertEquals($questionText, $clonedQuestion->getText());
        $this->assertEquals(1, $question->getAnswers()->count());
        $this->assertNull($clonedAnswer->getId());
        $this->assertNotEquals($question, $clonedAnswer->getQuestion());
        $this->assertEquals($clonedQuestion, $clonedAnswer->getQuestion());
    }

    public function testGetId() {
        $this->assertNull($this->question->getId());
        $this->question->setId(1);
        $this->assertEquals(1, $this->question->getId());
    }

    public function testAddAnswer() {
        $answer = new MultipleChoiceAnswer();
        $this->assertEquals(0, $this->question->getAnswers()->count());
        $this->question->addAnswer($answer);
        $this->assertEquals(1, $this->question->getAnswers()->count());
        $this->assertEquals($answer, $this->question->getAnswers()->get(0));
    }

    public function testRemoveAnswer() {
        $answer = new MultipleChoiceAnswer();
        $this->question->addAnswer($answer);
        $this->question->removeAnswer($answer);
        $this->assertEquals(0, $this->question->getAnswers()->count());
        $this->assertNull($answer->getQuestion());
    }

    public function testGetActualAnswers() {
        $answer = new MultipleChoiceAnswer();
        $this->question->addAnswer($answer);
        $this->question->addActualAnswer($answer);

        $this->assertEquals(1, $this->question->getActualAnswers()->count());
        $this->assertEquals($answer, $this->question->getActualAnswers()->get(0));
    }

    public function testRemoveActualAnswer() {
        $answer = new MultipleChoiceAnswer();
        $this->question->addAnswer($answer);
        $this->question->addActualAnswer($answer);
        $this->question->removeActualAnswer($answer);
        $this->assertEquals(0, $this->question->getActualAnswers()->count());
        $this->assertNull($answer->getQuestionForSelectedAnswer());
    }

}
