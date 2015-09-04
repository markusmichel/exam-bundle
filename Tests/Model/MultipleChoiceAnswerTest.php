<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Model\AnswerInterface;
use MMichel\ExamBundle\Model\MultipleChoiceAnswerInterface;

class MultipleChoiceAnswerTest extends \PHPUnit_Framework_TestCase
{

    /** @var MultipleChoiceAnswer */
    protected $answer;

    public function setUp() {
        $this->answer = new MultipleChoiceAnswer();
    }

    public function testInheritedTypes() {
        $this->assertTrue($this->answer instanceof MultipleChoiceAnswerInterface);
        $this->assertTrue($this->answer instanceof AnswerInterface);
    }

    public function testClone() {
        $this->markTestIncomplete();
    }

    public function testToString() {
        $text = "Example question title";
        $this->answer->setText($text);
        $this->assertEquals($text, $this->answer->__toString());
    }

    public function testGetId() {
        $this->markTestIncomplete();
    }

    public function testText() {
        $text = "foo text";
        $this->assertNull($this->answer->getText());
        $this->answer->setText($text);
        $this->assertEquals($text, $this->answer->getText());
    }

    public function testIsCorrect() {
        $this->assertFalse($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(true);
        $this->assertTrue($this->answer->getIsCorrect());
    }

    public function testSetQuestion() {
        $question = new MultipleChoiceQuestion();

        $this->assertNull($this->answer->getQuestion());
        $this->answer->setQuestion($question);
        $this->assertEquals($question, $this->answer->getQuestion());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidQuestion() {
        $question = new SingleChoiceQuestion();
        $this->answer->setQuestion($question);
    }

    public function testSetCorrectAnswer() {
        $this->assertFalse($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(true);
        $this->assertTrue($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(false);
        $this->assertFalse($this->answer->getIsCorrect());
    }

}
