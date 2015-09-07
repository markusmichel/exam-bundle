<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Model\AnswerInterface;
use MMichel\ExamBundle\Model\MultipleChoiceAnswerInterface;
use MMichel\ExamBundle\Tests\TestMultipleChoiceAnswer;

class MultipleChoiceAnswerTest extends \PHPUnit_Framework_TestCase
{

    /** @var MultipleChoiceAnswer */
    protected $answer;

    public function setUp() {
        $this->answer = new TestMultipleChoiceAnswer();
    }

    public function testInheritedTypes() {
        $this->assertTrue($this->answer instanceof MultipleChoiceAnswerInterface);
        $this->assertTrue($this->answer instanceof AnswerInterface);
    }

    public function testClone() {
        $this->answer->setId(1);
        $clone = clone $this->answer;
        $this->assertNull($clone->getId());
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

    public function testSetCorrectAnswer() {
        $this->assertFalse($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(true);
        $this->assertTrue($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(false);
        $this->assertFalse($this->answer->getIsCorrect());
    }

}
