<?php

namespace Tasks\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator;

class TasksTable extends AbstractTableGateway
{
    protected $table ='tasks';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new TaskModel());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function getOlolo()
    {
        $resultSet = $this->adapter->query("SELECT * FROM `{$this->table}` WHERE `id` = ?", array(1));
        return $resultSet;
    }
    
    public function addColumn($options = array())
    {
        
        $hydrator = new \Zend\Stdlib\Hydrator\ArraySerializable();
        $object = new \ArrayObject(array(
            'hello' => 'ololo1',
        ));
        
        $hydrator->hydrate(array(
            'world' => 'ololo2',
        ), $object);
        \Zend\Debug\Debug::dump($hydrator);exit();
    }
    
    

    public function getTask($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveTask(TaskModel $task)
    {
        $data = array(
            'artist' => $task->artist,
            'title'  => $task->title,
        );
        $id = (int)$task->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getTask($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteTask($id)
    {
        $this->delete(array('id' => $id));
    }
}