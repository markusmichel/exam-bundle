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
No configuration required.
