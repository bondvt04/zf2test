<?php

namespace Tags\Controller;

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
        
        // Create the cloud and assign static tags to it
        $cloud = new \Zend\Tag\Cloud(array(
            'tags' => array(
                'code' => array('title' => 'code', 'weight' => 50,
                      'params' => array('url' => '/tag/code')),
                'tag' => array('title' => 'code', 'weight' => 51,
                      'params' => array('url' => '/tag/code')),
                'zend' => array('title' => 'zend', 'weight' => 1,
                      'params' => array('url' => '/tag/zend-framework')),
                'zend2' => array('title' => 'php', 'weight' => 5,
                      'params' => array('url' => '/tag/php')),
                'zend' => array('title' => 'code', 'weight' => 150,
                      'params' => array('url' => '/tag/code')),
            )
        ));
        //\Zend\Debug\Debug::dump($cloud->getTagDecorator());
        
        $cloud->setTagDecorator(new \Zend\Tag\Cloud\Decorator\HtmlTag());
        // Render the cloud
        echo $cloud;
        exit();
        
        return new ViewModel(array());
    }
    
}
