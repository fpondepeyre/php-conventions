<?php

namespace Agora\PhpConventions;

use GrumPHP\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

class GrumphpTasksExtension implements ExtensionInterface
{
    public function load(ContainerBuilder $container)
    {
        if ($container->hasParameter('extra_tasks')) {
            $tasks = $container->getParameter('tasks');

            foreach ($container->getParameter('extra_tasks') as $name => $value) {
                if (isset($tasks[$name])) {
                    throw new RuntimeException(
                        sprintf("Cannot override already defined task '%s' in 'extra_tasks'", $name)
                    );
                }

                $tasks[$name] = $value;
            }

            $container->setParameter('tasks', $tasks);
        }

        if ($container->hasParameter('skip_tasks')) {
            $tasks = $container->getParameter('tasks');

            foreach ($container->getParameter('skip_tasks') as $name) {
                unset($tasks[$name]);
            }

            $container->setParameter('tasks', $tasks);
        }
    }
}
