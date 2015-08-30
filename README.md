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
        new MMichel\ExamBundle\ExamBundle(),
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
