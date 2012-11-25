<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Figlet\Controller\Index' => 'Figlet\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Tags/index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/figlet[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Figlet\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Figlet\Controller\Index' => 'Figlet\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'figlet' => __DIR__ . '/../view',
        ),
    ),
);