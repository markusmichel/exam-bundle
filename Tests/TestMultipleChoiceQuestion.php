<?php

namespace MMichel\ExamBundle\Tests;


use MMichel\ExamBundle\Entity\MultipleChoiceQuestion;

class TestMultipleChoiceQuestion extends MultipleChoiceQuestion
{

    public function setId($id) {
        $this->id = $id;
    }

}