<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tags\Controller\Index' => 'Tags\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tags' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Tags/index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tags[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tags\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
);
