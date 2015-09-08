# exam-bundle

Installation
------------

Require the bundle in your composer.json file:

```
$ composer require mmichel/exam-bundle
```

Register the bundle:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new MMichel\ExamBundle\MMichelExamBundle(),
        // ...
    );
}
```

Configuration
====================

## enable form themes
```yml
# app/config/config.yml
twig:
    form_themes:
        - "MMichelExamBundle:Form:form_fields.html.twig"
```

Usage
====================

## Predefined classes
There are a couple of predefined classes which makes it easier to create exams/tests containing simple right or wrong questions. Feel free to reuse and/or extend them.

- [MMichel\ExamBundle\Entity\Question](/Entity/Question.php): Base class for all types of Questions
- [MMichel\ExamBundle\Entity\SingleChoiceQuestion](/Entity/SingleChoiceQuestion.php)
- [MMichel\ExamBundle\Entity\MultipleChoiceQuestion](/Entity/MultipleChoiceQuestion.php)
- [MMichel\ExamBundle\Entity\SingleChoiceAnswer](/Entity/SingleChoiceAnswer.php)
- [MMichel\ExamBundle\Entity\MultipleChoiceAnswer](/Entity/MultipleChoiceAnswer.php)
- [MMichel\ExamBundle\Entity\Exam](/Entity/Exam.php): A Collection of both MultipleChoice- and SingleChoice Questions

## Administrative Forms


## User Forms (tests, exams)
There is a predefined FormType `ExamType`, which displays a collection of `MultipleChoice` and `SingleChoice` questions. If you want to display your own form types, you have to tag them with `form.question_type` and add the attribute `data_class` to it.

```xml
<service id="mmichel.form.type.multiple_choice_question_type" class="MMichel\ExamBundle\Form\MultipleChoiceQuestionType">
    <tag name="form.type" />
    <tag name="form.question_type" data_class="MMichel\ExamBundle\Entity\MultipleChoiceQuestion" />
</service>
```

**Note:**
*Currently, only the `buildForm` method of your custom form types will be used!*

Example usage
==========
```php
// AppBundle\Controller\ExampleExamController

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use MMichel\ExamBundle\Form\ExamType;
use MMichel\ExamBundle\Entity\Exam;

/**
 * @Route("/start_exam/{id}", name="exam_start")
 * @Template()
 */
public function startExamAction(Exam $examTemplate, Request $request) {
    $manager = $this->getDoctrine()->getManager();

    $form = $this->createForm(new ExamType(), $examTemplate);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {
        // Don't forget to detatch the exam template
        $manager->detach($examTemplate);

        // clone the exam template to make a completely new exam
        $manager->persist(clone $examTemplate);
        $manager->flush();

        // ....
    }

    return array(
        'form' => $form->createView(),
    );
}
```
