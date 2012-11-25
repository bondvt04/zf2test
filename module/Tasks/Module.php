<?php

namespace Tasks;

use Tasks\Model\TasksTable;
use Tasks\Model\PrioritiesTable;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Tasks\Model\TasksTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TasksTable($dbAdapter);
                    return $table;
                },
                'Tasks\Model\PrioritiesTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new PriorityTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }
    
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
}