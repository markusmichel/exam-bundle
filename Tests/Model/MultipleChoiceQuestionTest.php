<?php

namespace MMichel\ExamBundle\Tests\Model;


use Doctrine\ORM\EntityManager;
use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;
use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MultipleChoiceQuestionTest extends KernelTestCase
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
        $question = new MultipleChoiceQuestion();
        $this->assertEmpty($question->getAnswers());
        $this->assertEquals(0, $question->getAnswers()->count());

        $answer = new MultipleChoiceAnswer();
        $question->addAnswer($answer);

        $this->assertEquals(1, $question->getAnswers()->count());
        $this->assertEquals($question, $answer->getQuestion());
        $this->assertEquals($answer, $question->getAnswers()->first());
    }

    public function testSave() {
        $question = new MultipleChoiceQuestion();
        $question->setText("TEXT");

        $answer = new MultipleChoiceAnswer();
        $answer->setText("ANSWER");
        $question->addAnswer($answer);

        $this->em->persist($question);
        $this->em->flush();

        $this->assertNotNull($question->getId());
        $this->assertNotNull($answer->getId());
    }

    public function testRemove() {
        $question = new MultipleChoiceQuestion();
        $question->setText("TEXT");

        $answer = new MultipleChoiceAnswer();
        $answer->setText("ANSWER");
        $question->addAnswer($answer);

        $this->em->persist($question);
        $this->em->flush();

        $this->em->remove($question);
        $this->em->flush();

        $this->assertNull($question->getId());
        $this->assertNull($answer->getId());
    }
}
