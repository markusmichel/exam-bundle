<?php

namespace MMichel\ExamBundle\Tests;


use MMichel\ExamBundle\Entity\SingleChoiceAnswer;

class TestSingleChoiceAnswer extends SingleChoiceAnswer
{
    public function setId($id) {
        $this->id = $id;
    }
}