<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Validator\Controller\Index' => 'Validator\Controller\IndexController',
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
                    'route'    => '[/:lang]/validator[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Validator\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
);