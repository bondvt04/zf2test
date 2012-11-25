<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Cache\Controller\Index' => 'Cache\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tasks' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Cache\index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/cache[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cache\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
);
