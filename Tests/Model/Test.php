<?php

namespace MMichel\ExamBundle\Tests\Model;


use MMichel\ExamBundle\Model\AbstractQuestionTemplate;

class ATest extends \PHPUnit_Framework_TestCase
{
    /** @var AbstractQuestionTemplate */
    private $template;

    public function setUp() {
        $this->template = $this->getMockForAbstractClass('MMichel\ExamBundle\Model\AbstractQuestionTemplate');
    }

    public function testClone() {
        $clone = clone $this->template;
        $this->assertFalse($clone->isTemplate());
    }

    public function testSetIsTemplate() {
        $this->assertTrue($this->template->isTemplate());
        $this->template->setIsTemplate(false);
        $this->assertFalse($this->template->isTemplate());
    }
}
