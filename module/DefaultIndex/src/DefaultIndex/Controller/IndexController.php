<?php

namespace DefaultIndex\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Tasks\Model\TasksTable;

class IndexController extends AbstractActionController
{
    protected $tasksTable;
    
    public function indexAction()
    {
//        \Zend\Debug\Debug::dump($this->params()->fromRoute());exit();
        $tasksTable = $this->getTasksTable();
        $tasks = $tasksTable->fetchAll();
        return new ViewModel(array(
            'tasks' => $tasks,
        ));
    }
    
    public function addAction()
    {
        $form = $this->getAddEditTaskForm();
        \Zend\Debug\Debug::dump($form);exit();
        return new ViewModel();
    }
    
    public function getTasksTable()
    {
        if (!$this->tasksTable) {
            $sm = $this->getServiceLocator();
            $this->tasksTable = $sm->get('Tasks\Model\TasksTable');
        }
        return $this->tasksTable;
    }
}
