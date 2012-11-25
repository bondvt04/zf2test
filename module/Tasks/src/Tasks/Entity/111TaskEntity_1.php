<?php

namespace Tasks\Entity;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

use Tasks\Entity\PriorityEntity;

class TaskEntity extends InputFilter//implements InputFilterAwareInterface
{
    public $id;
    //protected $priority;
    public $task;
    public $creation_time;
    
    protected $inputFilter;
    
    
    /**
     * @see ParameterObject::__set()
     * @param string $key
     * @param mixed $value
     * @throws \Exception
     * @return void
     */
    public function __set($key, $value)
    {
        $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        if (!method_exists($this, $setter)) {
            throw new \Exception(
                'The option "' . $key . '" does not '
                . 'have a matching ' . $setter . ' setter method '
                . 'which must be defined'
            );
        }
        $this->{$setter}($value);
    }
    
    /**
     * @see ParameterObject::__get()
     * @param string $key
     * @throws \Exception
     * @return mixed
     */
    public function __get($key)
    {
        $getter = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        if (!method_exists($this, $getter)) {
            throw new \Exception(
                'The option "' . $key . '" does not '
                . 'have a matching ' . $getter . ' getter method '
                . 'which must be defined'
            );
        }
        return $this->{$getter}();
    }
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getCreationTime()
    {
        return $this->creation_time;
    }
    
    public function setCreationTime($creationTime)
    {
        $this->creation_time = $creationTime;
        return $this;
    }
    
    /**
     * @param Priority $brand
     * @return Priority
     \*/
    public function getPriority()
    {
        return $this->priority;
    }
    
    /**
     * @param Priority $priority
     * @return Task
     \*/
    public function setPriority(Priority $priority)
    {
        $this->priority = $priority;
        return $this;
    }
    
    public function getTask()
    {
        return $this->task;
    }
    
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }
    
    
//    
//    public function setTask($task)
//    {
//        $this->task = $task;
//        return $this;
//    }
    
    
    

    public function exchangeArray($data)
    {
        $this->setId((isset($data['id'])) ? $data['id'] : null);
        $this->setTask((isset($data['task'])) ? $data['task'] : null);
        $this->setCreationTime((isset($data['creation_time'])) ? $data['creation_time'] : null);
    }
    
    public function getArrayCopy()
    {
        //return get_object_vars($this);
        $arrayCopy = array(
            'id' => $this->getId(),
            'task' => $this->getTask(),
            'creation_time' => $this->getCreationTime(),
        );
        return $arrayCopy;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

//            $inputFilter->add($factory->createInput(array(
//                'name'     => 'id',
//                'required' => true,
//                'filters'  => array(
//                    array('name' => 'Int'),
//                ),
//            )));

//            $inputFilter->add($factory->createInput(array(
//                'name'     => 'task',
//                'required' => true,
//                'filters'  => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array(
//                        'name'    => 'StringLength',
//                        'options' => array(
//                            'encoding' => 'UTF-8',
//                            'min'      => 1,
//                            'max'      => 100,
//                        ),
//                    ),
//                ),
//            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}