<?php

namespace ServiceManager;

use Zend\ServiceManager\FactoryInterface;

class Hello implements FactoryInterface
{
    static public $count = 0;
    
    public function __construct()
    {
        self::$count++;
    }
    
    static public function getCount()
    {
        return self::$count;
    }
    
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        return $this->get(new $this());
    }
}

class Module
{
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'MegaModule\ololo' => function ($sm) {
                    return 10 . $sm->get('neededModule');
                },
                'AnotherMegaModule\ololo' => function ($sm) {
                    return 'Hello, world!';
                },
                'zlo' => function() {
                    return new \ServiceManager\Hello;
                },
                'zlo2' => function() {
                    // make it not shared
                    return new \ServiceManager\Hello;
                },
                '\ServiceManager\Hello',
                '\ServiceManager\Zlo\Hello',
            ),
            'shared' => array(
                'zlo2' => false,
            ),
            'aliases' => array(
                'neededModule' => 'AnotherMegaModule\ololo',
            ),
            'abstract_factories' => array(
                
            ),
//            'abstract_factories' => array(
//                // Valid values include names of classes implementing
//                // AbstractFactoryInterface, instances of classes implementing
//                // AbstractFactoryInterface, or any PHP callbacks
//                'SomeModule\Service\FallbackFactory',
//            ),
//            'aliases' => array(
//                // Aliasing a FQCN to a service name
//                'SomeModule\Model\User' => 'User',
//                // Aliasing a name to a known service name
//                'AdminUser' => 'User',
//                // Aliasing to an alias
//                'SuperUser' => 'AdminUser',
//            ),
//            'factories' => array(
//                // Keys are the service names.
//                // Valid values include names of classes implementing
//                // FactoryInterface, instances of classes implementing
//                // FactoryInterface, or any PHP callbacks
//                'User'     => 'SomeModule\Service\UserFactory',
//                'UserForm' => function ($serviceManager) {
//                    $form = new SomeModule\Form\User();
//
//                    // Retrieve a dependency from the service manager and inject it!
//                    $form->setInputFilter($serviceManager->get('UserInputFilter'));
//                    return $form;
//                },
//            ),
//            'invokables' => array(
//                // Keys are the service names
//                // Values are valid class names to instantiate.
//                'UserInputFiler' => 'SomeModule\InputFilter\User',
//            ),
//            'services' => array(
//                // Keys are the service names
//                // Values are objects
//                'Auth' => new SomeModule\Authentication\AuthenticationService(),
//            ),
//            'shared' => array(
//                // Usually, you'll only indicate services that should _NOT_ be
//                // shared -- i.e., ones where you want a different instance
//                // every time.
//                'UserForm' => false,
//            ),
        );
    }
    
}