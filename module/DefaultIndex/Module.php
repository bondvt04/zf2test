<?php

namespace DefaultIndex;

use Zend\Mvc\ModuleRouteListener;

class Module
//    implements
//    AutoloaderProviderInterface,
//    ConfigProviderInterface,
//    ViewHelperProviderInterface

{
    public function onBootstrap($e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
//    /**
//     * describe our view helpers
//     * @return array
//     */
//    public function getViewHelperConfig()
//    {
//        return array(
//            'factories' => array(
//                'side_right' => function($sm) {
//                    $helper = new \DefaultIndex\View\Helper\SideRight ;
//                    return $helper;
//                }
//            )
//        );  
//   }
}
