<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Entity\SingleChoiceAnswer;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Model\QuestionInterface;
use MMichel\ExamBundle\Model\SingleChoiceQuestionInterface;
use MMichel\ExamBundle\Tests\TestSingleChoiceAnswer;
use MMichel\ExamBundle\Tests\TestSingleChoiceQuestion;

class SingleChoiceQuestionTest extends \PHPUnit_Framework_TestCase
{

    /** @var SingleChoiceQuestion */
    protected $question;

    /** @var SingleChoiceAnswer */
    protected $answer;

    public function setUp() {
        $this->question = new TestSingleChoiceQuestion();
        $this->answer = new TestSingleChoiceAnswer();
    }

    public function testInheritedTypes() {
        $this->assertTrue($this->question instanceof Question);
        $this->assertTrue($this->question instanceof SingleChoiceQuestionInterface);
        $this->assertTrue($this->question instanceof QuestionInterface);
    }

    public function testClone() {
        $id = $anserId = 1;
        $this->question->setId($id);

        $answer = new TestSingleChoiceAnswer();
        $answer->setId($id);
        $this->question->setCorrectAnswer($answer);
        $this->question->addIncorrectAnswer($answer);

        $clonedQuestion = clone $this->question;

        $this->assertNotNull($clonedQuestion->getCorrectAnswer());
        $this->assertNotEquals($answer, $clonedQuestion->getCorrectAnswer());
        $this->assertNull($clonedQuestion->getCorrectAnswer()->getId());

        $this->assertNotNull($clonedQuestion->getIncorrectAnswers()->get(0));
        $this->assertNotEquals($answer, $clonedQuestion->getIncorrectAnswers()->get(0));
        $this->assertNull($clonedQuestion->getIncorrectAnswers()->get(0)->getId());
    }

    public function testGetId() {
        $id = 1;
        $this->assertNull($this->question->getId());
        $this->question->setId($id);
        $this->assertEquals($id, $this->question->getId());
    }

    public function testGetCorrectAnswer() {
        $this->assertNull($this->question->getCorrectAnswer());
        $this->question->setCorrectAnswer($this->answer);
        $this->assertEquals($this->answer, $this->question->getCorrectAnswer());

        // Must be able to set back to null
        $this->question->setCorrectAnswer(null);
        $this->assertNull($this->question->getCorrectAnswer());
    }

    public function testRemoveIncorrectAnswer() {
        $this->question->addIncorrectAnswer($this->answer);
        $this->question->removeIncorrectAnswer($this->answer);

        $this->assertEquals(0, $this->question->getIncorrectAnswers()->count());
        $this->assertNull($this->answer->getQuestion());
    }

    public function testGetAnswers() {
        $this->assertEquals(0, $this->question->getAnswers()->count());
        $this->question->addIncorrectAnswer($this->answer);
        $this->question->setCorrectAnswer($this->answer);

        $this->assertEquals(2, $this->question->getAnswers()->count());
    }

    public function testSetActualAnswer() {
        $this->assertNull($this->question->getActualAnswer());
        $this->question->setActualAnswer($this->answer);
        $this->assertEquals($this->answer, $this->question->getActualAnswer());
    }

    public function testSetInvalidActualAnswer() {
        // @todo: Check if the actual answer is in the passible anwer list (correct + incorrect answers)?
        $this->markTestSkipped();
    }

}
