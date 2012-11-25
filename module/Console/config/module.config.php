<?php

return array(

    'controllers' => array(
        'invokables' => array(
            'Console\Controller\Index' => 'Console\Controller\IndexController',
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'Console/get-summ' => array(
                    'options' => array(
                        'route' => 'get summ <arg1> <arg2> [--verbose|-v]', 
                        'defaults' => array(
                            '__NAMESPACE__' => 'Console\Controller',
                            'controller' => 'index',
                            'action' => 'get-summ'
                        ),
                    ),
                ),
                'Console/get-cnt' => array(
                    'options' => array(
                        'route' => 'get cnt [--verbose|-v]',
                        'defaults' => array(
                            '__NAMESPACE__' => 'Console\Controller',
                            'controller' => 'index',
                            'action' => 'get-cnt'
                        ),
                    ),
                ),
            )
        )
    ),
);
