<?php

namespace MMichel\ExamBundle;

use MMichel\ExamBundle\DependencyInjection\QuestionFormTypeCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MMichelExamBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new QuestionFormTypeCompilerPass());
    }

}
