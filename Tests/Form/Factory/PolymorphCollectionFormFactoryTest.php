<?php

namespace MMichel\ExamBundle\Tests\Form\Factory;


use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use MMichel\ExamBundle\Form\Factory\PolymorphCollectionFormFactory;
use Symfony\Component\Form\FormTypeInterface;

class PolymorphCollectionFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var PolymorphCollectionFormFactory */
    private $factory;

    public function setUp() {
        $this->factory = new PolymorphCollectionFormFactory();
        foreach($this->getTestTypes() as $type) {
            $this->factory->addQuestionFormType($type[0], $type[1]);
        }
    }

    public function getTestTypes() {
        return array(
            array($this->getMock('MMichel\ExamBundle\Form\MultipleChoiceQuestionTestType'), 'MMichel\ExamBundle\Entity\MultipleChoiceQuestion', new MultipleChoiceQuestion()),
            array($this->getMock('MMichel\ExamBundle\Form\SingleChoiceQuestionTestType'), 'MMichel\ExamBundle\Entity\SingleChoiceQuestion', new SingleChoiceQuestion()),
        );
    }

    /**
     * @dataProvider getTestTypes
     */
    public function testGetFormForObject($type, $className, $obj) {
        $formType = $this->factory->getFormForObject($obj);
        $this->assertNotNull($formType);
        $this->assertTrue($formType instanceof FormTypeInterface);
    }

    /**
     * @dataProvider getTestTypes
     */
    public function testGetFormForClass($type, $className) {
        $formType = $this->factory->getFormForClass($className);
        $this->assertNotNull($formType);
        $this->assertTrue($formType instanceof FormTypeInterface);
    }

    public function testGetDefaultForm() {
        $formType = $this->factory->getDefaultForm();
        $this->assertNotNull($formType);
        $this->assertTrue($formType instanceof FormTypeInterface);
    }

}
