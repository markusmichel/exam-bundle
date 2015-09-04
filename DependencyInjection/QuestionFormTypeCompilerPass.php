<?php

namespace MMichel\ExamBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;

class QuestionFormTypeCompilerPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if(!$container->has('mmichel.form.question_form_factory')) {
            return;
        }

        $definition = $container->getDefinition('mmichel.form.question_form_factory');

        $services = $container->findTaggedServiceIds('form.question_type');

        foreach($services as $id => $tags) {

            foreach($tags as $attributes) {
                if(!array_key_exists("data_class", $attributes)) {
                    throw new NoSuchPropertyException('Attribute "data_class" must exist for tag "form.question_type"');
                }

                $definition->addMethodCall(
                    'addQuestionFormType',
                    array(new Reference($id), $attributes["data_class"])
                );
            }

        }
    }
}