<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'TextTable\Controller\Index' => 'TextTable\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'text-table' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Tags/index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/text-table[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'TextTable\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
);
