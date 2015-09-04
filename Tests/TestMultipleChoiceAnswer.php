<?php

namespace MMichel\ExamBundle\Tests;


use MMichel\ExamBundle\Entity\MultipleChoiceAnswer;

class TestMultipleChoiceAnswer extends MultipleChoiceAnswer
{
    public function setId($id) {
        $this->id = $id;
    }
}