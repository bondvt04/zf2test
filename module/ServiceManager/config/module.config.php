<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'ServiceManager\Controller\Index' => 'ServiceManager\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tasks' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'ServiceManager\index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/service-manager[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ServiceManager\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
        ),
    ),
);
