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
------------
## enable form themes
```yml
# app/config/config.yml
twig:
    form_themes:
        - "MMichelExamBundle:Form:form_fields.html.twig"
```

Usage
------------
## Predefined classes
There are a couple of predefined classes which makes it easier to create exams/tests containing simple right or wrong questions. Feel free to reuse and/or extend them.

- `MMichel\ExamBundle\Entity\Question`: Base class for all types of Questions
- `MMichel\ExamBundle\Entity\SingleChoiceQuestion`
- `MMichel\ExamBundle\Entity\MultipleChoiceQuestion`
- `MMichel\ExamBundle\Entity\SingleChoiceAnswer`
- `MMichel\ExamBundle\Entity\MultipleChoiceAnswer`
- `MMichel\ExamBundle\Entity\Exam`: A Collection of both MultipleChoice- and SingleChoice Questions

## Administrative Forms


## User Forms (tests, exams)

