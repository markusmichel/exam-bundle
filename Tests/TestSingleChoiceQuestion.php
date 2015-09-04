<?php

namespace MMichel\ExamBundle\Tests;


use MMichel\ExamBundle\Entity\SingleChoiceQuestion;

class TestSingleChoiceQuestion extends SingleChoiceQuestion
{
    public function setId($id) {
        $this->id = $id;
    }
}