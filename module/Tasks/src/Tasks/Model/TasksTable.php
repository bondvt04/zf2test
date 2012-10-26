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
        
        $artistTable = new \Zend\Db\TableGateway\TableGateway('tasks', $this->adapter);
        
        $artistTable->select(function (\Zend\Db\Sql\Select $select) {
//            $select->where->like('name', 'Brit%');
            $select->order('name ASC')->limit(2);
        });
        
        \Zend\Debug\Debug::dump('asdf');exit();
        
        
        
        
        ////////////////////////////////////////////////////////////////////////
        $sql = new \Zend\Db\Sql\Sql($this->adapter);
        
        $select = $sql->select();
        $select->from("{$this->table}");
        
        $select->where(array(
            "`id` > '10'",
            'ololo' => '20',
            new \Zend\Db\Sql\Predicate\Like('hello', '%zf%'),
            "hello" => array(
                '1',
                '2',
                '3',
                '4',
                '5',
            ),
        ));
        $pred = new \Zend\Db\Sql\Predicate\Predicate();
        $pred->orPredicate(new \Zend\Db\Sql\Predicate\Like('world', '%zf1%'));
        $pred->orPredicate(new \Zend\Db\Sql\Predicate\Like('world', '%zf2%'));
        $pred->orPredicate(new \Zend\Db\Sql\Predicate\Like('world', '%conf%'));
        $select->where(array(
            $pred
        ));
        
//        $where = new \Zend\Db\Sql\Where();
//        $where->literal('id', 123);
//        $select->where($where);
        
        
        
        
        \Zend\Debug\Debug::dump($select->getSqlString());
        
        $select2 = $sql->insert();
        $select2->into("{$this->table}");
        $select2->columns(array(
            "task",
        ));
        $select2->values(array(
            'task' => 'hello',
        ));
        \Zend\Debug\Debug::dump($select2->getSqlString());
        
        $select3 = $sql->update();
        $select3->table("{$this->table}");
        $select3->set(array(
            "task" => 'hello',
            "datetime" => '2012-10-24',
        ));
        $select3->where(array(
            "id" => array(
                '1',
                '2',
                '3',
                '4',
                '5',
            ),
        ));
        \Zend\Debug\Debug::dump($select3->getSqlString());
        exit();
        //\Zend\Debug\Debug::dump($this->selectWith($select)->current()->getArrayCopy());exit();
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