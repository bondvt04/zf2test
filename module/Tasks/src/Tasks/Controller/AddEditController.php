<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Form\AddEditTaskForm;
//use Tasks\Form\TasksForm;

class AddEditController extends AbstractActionController
{
    protected $tasksTable;
    protected $addEditTaskForm;
    
    public function init()
    {
        //$this->form = $this->getAddEditTaskForm();
        //$this->entity = new TaskEntity();
        //$this->form->bind($this->entity);
    }
    
    public function addAction()
    {
        $this->init();
        
        if($this->getRequest()->isPost()) {
            $this->form->setInputFilter($this->entity->getInputFilter());
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $this->getTasksTable()->saveTask($this->entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
            
            if ($form->isValid()) {
                $this->entity->save();
            }
        }
        return new ViewModel(array(
            'addEditTaskForm' => $this->form,
        ));
    }
    
    public function editAction()
    {
        $this->init();
        
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('tasks-add');
        }
        
        $this->entity = $this->getTasksTable()->getTask($id);//new \Tasks\Entity\TaskEntity();//$this->getTasksTable()->getTask($id);
        
        \Zend\Debug\Debug::dump($this->entity->getTask());exit();
        $this->form = $this->getAddEditTaskForm();
        $this->form->bind($this->entity);
        
        
        $this->form->setAttribute('action', $this->url()->fromRoute('tasks-edit', array(
            'id' => $id,
        )));
        $this->form->get('submit')->setAttribute('value', 'Edit');
        
        if($this->getRequest()->isPost()) {
            $this->form->setInputFilter($this->entity->getInputFilter());
            $this->form->setData($this->getRequest()->getPost());
            
            
            //\Zend\Debug\Debug::dump($this->getRequest()->getPost());exit();
            
            
            if ($this->form->isValid()) {
//                \Zend\Debug\Debug::dump($this->form->getData());exit();
                \Zend\Debug\Debug::dump($this->entity);exit();
                
                $this->getTasksTable()->saveTask($this->entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('home');
            }
        }
        
        return new ViewModel(array(
            'addEditTaskForm' => $this->form,
        ));
    }
    
    public function getAddEditTaskForm()
    {
        if (!$this->addEditTaskForm) {
            $this->addEditTaskForm = new AddEditTaskForm();
        }
        return $this->addEditTaskForm;
    }
    
    public function getTasksTable()
    {
        if (!$this->tasksTable) {
            $sm = $this->getServiceLocator();
            $this->tasksTable = $sm->get('Tasks\Model\TasksTable');
        }
        return $this->tasksTable;
    }
    
//    public function addAction()
//    {
//        $form = new AlbumForm();
//        $form->get('submit')->setValue('Add');
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $album = new Album();
//            $form->setInputFilter($album->getInputFilter());
//            $form->setData($request->getPost());
//
//            if ($form->isValid()) {
//                $album->exchangeArray($form->getData());
//                $this->getAlbumTable()->saveAlbum($album);
//
//                // Redirect to list of albums
//                return $this->redirect()->toRoute('album');
//            }
//        }
//        return array('form' => $form);
//    }
//
//    public function editAction()
//    {
//        $id = (int) $this->params()->fromRoute('id', 0);
//        if (!$id) {
//            return $this->redirect()->toRoute('album', array(
//                'action' => 'add'
//            ));
//        }
//        $album = $this->getAlbumTable()->getAlbum($id);
//
//        $form  = new AlbumForm();
//        $form->bind($album);
//        $form->get('submit')->setAttribute('value', 'Edit');
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $form->setInputFilter($album->getInputFilter());
//            $form->setData($request->getPost());
//
//            if ($form->isValid()) {
//                $this->getAlbumTable()->saveAlbum($album);
//
//                // Redirect to list of albums
//                return $this->redirect()->toRoute('album');
//            }
//        }
//
//        return array(
//            'id' => $id,
//            'form' => $form,
//        );
//    }
//
//    public function deleteAction()
//    {
//        $id = (int) $this->params()->fromRoute('id', 0);
//        if (!$id) {
//            return $this->redirect()->toRoute('album');
//        }
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $del = $request->getPost('del', 'No');
//
//            if ($del == 'Yes') {
//                $id = (int) $request->getPost('id');
//                $this->getAlbumTable()->deleteAlbum($id);
//            }
//
//            // Redirect to list of albums
//            return $this->redirect()->toRoute('album');
//        }
//
//        return array(
//            'id'    => $id,
//            'album' => $this->getAlbumTable()->getAlbum($id)
//        );
//    }
}














        //$album = $this->getAlbumTable()->getAlbum($id);
        
//        \Zend\Debug\Debug::dump($this->getRequest()->getQuery());
//        \Zend\Debug\Debug::dump($this->getRequest()->getUri());
//        \Zend\Debug\Debug::dump($this->getRequest()->getUriString());
//        \Zend\Debug\Debug::dump($this->params()->fromRoute());
//        \Zend\Debug\Debug::dump($this->params()->fromQuery());
//        \Zend\Debug\Debug::dump($this->params()->fromHeader());
//        \Zend\Debug\Debug::dump($this->params()->fromFiles());
//        exit();
        
