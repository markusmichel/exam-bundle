<?php

namespace MMichel\ExamBundle\Tests;


use MMichel\ExamBundle\Entity\Exam;

class TestExam extends Exam
{
    public function setId($id) {
        $this->id = $id;
    }
}