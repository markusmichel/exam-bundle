<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Entity\SingleChoiceAnswer;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Tests\TestSingleChoiceAnswer;

class SingleChoiceAnswerTest extends \PHPUnit_Framework_TestCase
{

    /** @var SingleChoiceAnswer */
    protected $answer;

    public function setUp() {
        $this->answer = new TestSingleChoiceAnswer();
    }

    public function testClone() {
        $id = 1;
        $text = "Test Title";
        $this->answer->setId($id);
        $this->answer->setText($text);
        $this->assertEquals($id, $this->answer->getId());

        $cloned = clone $this->answer;
        $this->assertNull($cloned->getId());
        $this->assertEquals($text, $this->answer->getText());
    }

    public function testToString() {
        $text = "Example question title";
        $this->answer->setText($text);
        $this->assertEquals($text, $this->answer->__toString());
    }

    public function testSetText() {
        $this->markTestIncomplete();
    }

    public function testSetIsCorrect() {
        $this->assertFalse($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(true);
        $this->assertTrue($this->answer->getIsCorrect());
        $this->answer->setIsCorrect(false);
        $this->assertFalse($this->answer->getIsCorrect());
    }

}
