<?php

namespace Figlet\Controller;

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
        
        $figlet = new \Zend\Text\Figlet\Figlet();
        echo nl2br($figlet->render('Hello, World!'));
        exit();
        
        return new ViewModel(array(
            'figlet' => $figlet
        ));
    }
    
}
