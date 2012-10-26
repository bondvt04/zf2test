<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Model\TaskModel;
//use Tasks\Form\TasksForm;

class IndexController extends AbstractActionController
{
    protected $tasksTable;
    protected $tasksForm;
    
    public function indexAction()
    {
        $task = new \ArrayObject;
        $task['task'] = 'check my knowledges';
        
        $tasksForm = $this->getTasksForm();
        
        $tasksForm->bind($task);
        $tasksForm->setData(array(
            //'task' => 'hello',
        ));
        $tasksForm->isValid();
        
        \Zend\Debug\Debug::dump($tasksForm->getData());exit();
        
        return new ViewModel(array(
            'tasksForm' => $tasksForm
        ));
    }
    
    public function postAction()
    {
        $tasksForm = $this->getTasksForm();
        $tasksForm->setData($this->getRequest()->getPost());
        
        if($tasksForm->isValid()) {
            
        }
        return new ViewModel(array(
            'tasksForm' => $tasksForm
        ));
    }
    
    public function getTasksTable()
    {
        if (!$this->tasksTable) {
            $sm = $this->getServiceLocator();
            $this->tasksTable = $sm->get('Tasks\Model\TasksTable');
        }
        return $this->tasksTable;
    }
    
    public function getTasksForm()
    {
        if (!$this->tasksForm) {
            $this->tasksForm = new \Tasks\Form\TasksForm();
        }
        return $this->tasksForm;
    }
}
