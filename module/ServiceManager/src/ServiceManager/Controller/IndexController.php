<?php

namespace ServiceManager\Controller;

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
        
        $sm = $this->getServiceLocator();
        $ololo = $sm->get('MegaModule\ololo');
        
        \Zend\Debug\Debug::dump($ololo);
        
//        $obj = new \ServiceManager\Hello;
//        $obj = new \ServiceManager\Hello;
//        $obj = new \ServiceManager\Hello;
        $obj = $sm->get('zlo');
        $obj = $sm->get('zlo');
        $obj = $sm->get('zlo');
        $obj = $sm->get('zlo');
        \Zend\Debug\Debug::dump(\ServiceManager\Hello::getCount());
        $obj = $sm->get('zlo2');
        $obj = $sm->get('zlo2');
        $obj = $sm->get('zlo2');
        $obj = $sm->get('zlo2');// это и понятно, тут используется clone()
        \Zend\Debug\Debug::dump(\ServiceManager\Hello::getCount());
        
        exit();
        
        return new ViewModel(array(
            'txt' => $result,
        ));
    }
    
    public function doSomething()
    {
        return 'Hello, world!!!!!';
    }
    
}