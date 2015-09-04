<?php

namespace MMichel\ExamBundle\Tests\Doctrine;


use Doctrine\ORM\EntityManager;
use MMichel\ExamBundle\Entity\Exam;
use MMichel\ExamBundle\Entity\Question;
use MMichel\ExamBundle\Entity\SingleChoiceAnswer;
use MMichel\ExamBundle\Entity\SingleChoiceQuestion;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ExamTest extends KernelTestCase
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

    public function testCreate() {
        $exam = new Exam();

        $question = new SingleChoiceQuestion();
        $question->setText("Test Question");

        $answer = new SingleChoiceAnswer();
        $answer->setText("Test Answer");

        $question->setCorrectAnswer($answer);
        $exam->addQuestion($question);

        $this->em->persist($exam);
        $this->em->persist($question);
        $this->em->flush();

        $this->assertNotNull($exam->getId());
        $this->assertNotNull($exam->getQuestions());
        $this->assertNotNull($question->getId());
        $this->assertNotNull($answer->getId());

        $answer->setQuestion(null);
        $question->setCorrectAnswer(null);
        $this->em->remove($answer);
        $this->em->flush();

        $this->assertNull($answer->getId());
    }

}