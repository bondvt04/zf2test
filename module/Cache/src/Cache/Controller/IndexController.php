<?php

namespace Cache\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        $this->init();
        
        
        // Via factory:
        $cache = \Zend\Cache\StorageFactory::factory(array(
            'adapter' => 'filesystem',
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => false),
            ),
            'ttl' => 30,
        ));
        
//        \Zend\Debug\Debug::dump($cache->getCapabilities()->getSupportedDatatypes());
//        exit();
        
        $cache->getOptions()->setTtl(30);
        
        $key    = 'unique-cache-key';
        $result = $cache->getItem($key, $success);
        
        if (!$success) {
            $result = $this->doSomething();
            $cache->setItem($key, $result);
        }
        
        //\Zend\Debug\Debug::dump($result);exit();
        
        return new ViewModel(array(
            'txt' => $result,
        ));
    }
    
    public function doSomething()
    {
        return 'Hello, world!!!!!';
    }
    
}