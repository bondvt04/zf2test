<?php

return array(
    'view_helpers' => array(
        'invokables'=> array(
            'side_right' => 'DefaultIndex\View\Helper\SideRight',
        )
    ),
    'router' => array(
        'routes' => array(
            'links' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '[/:lang]/links[_p[=]:page]',
                    'constraints' => array(
                        'page' => '[0-9]+',
                        'lang' => '[a-z]{2}',
                    ),
                    'defaults' => array(
                        'controller' => 'DefaultIndex\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                        'lang'     => 'ru',
                    ),
                ),
            ),
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        //'controller' => 'DefaultIndex\Controller\Index',
                        'controller' => 'DefaultIndex\Controller\Index',
                        'action'     => 'index',
                        'lang'     => 'ru',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /default-index/:controller/:action
            'default-index' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/default-index',
                    'defaults' => array(
                        '__NAMESPACE__' => 'DefaultIndex\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'DefaultIndex\Controller\Index' => 'DefaultIndex\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'default-index/index/index' => __DIR__ . '/../view/default-index/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
