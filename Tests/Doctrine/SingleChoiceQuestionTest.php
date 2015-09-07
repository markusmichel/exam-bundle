<?php

namespace MMichel\ExamBundle\Tests\Doctrine;


use Doctrine\ORM\EntityManager;
use MMichel\ExamBundle\Entity\SingleChoiceAnswer;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SingleChoiceQuestionTest extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    private $em;

    public function setUp() {
        static::bootKernel();
        $kernel = static::$kernel;
        $container = $kernel->getContainer();
        $this->em = $container->get('doctrine')->getManager();
    }

    public function testAddAnswer() {
        $question = new SingleChoiceQuestion();
        $this->assertEmpty($question->getCorrectAnswer());
        $this->assertEmpty($question->getIncorrectAnswers());
        $this->assertEquals(0, $question->getIncorrectAnswers()->count());

        $answer = new SingleChoiceAnswer();
        $question->addIncorrectAnswer($answer);

        $this->assertEquals(1, $question->getIncorrectAnswers()->count());
        $this->assertEquals($answer, $question->getIncorrectAnswers()->first());
    }

    public function testSaveAndRemove() {
        $question = new SingleChoiceQuestion();
        $question->setText("TEXT");

        $answer = new SingleChoiceAnswer();
        $answer->setText("ANSWER");
        $question->addIncorrectAnswer($answer);

        $this->em->persist($question);
        $this->em->flush();

        $this->assertNotNull($question->getId());
        $this->assertNotNull($answer->getId());

        $this->em->remove($question);
        $this->em->flush();

        $this->assertNull($question->getId());
        $this->assertNull($answer->getId());
    }
}