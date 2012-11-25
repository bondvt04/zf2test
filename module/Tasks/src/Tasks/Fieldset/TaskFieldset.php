<?php

namespace Tasks\Fieldset;

use Tasks\Entity\TaskEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class TaskFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('task');
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new TaskEntity());

        $this->add(array(
            'name' => 'id',
            'options' => array(
                'label' => 'Tasks id'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        
        $this->add(array(
            'name' => 'task',
            'options' => array(
                'label' => 'Tasks description'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'creation_time',
            'options' => array(
                'label' => 'time of task add'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     \*/
    public function getInputFilterSpecification()
    {
        return array(
//            'id' => array(
//                'required' => true,
//            ),
//            'task' => array(
//                'required' => true,
//            ),
//            'price' => array(
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'Float'
//                    )
//                )
//            )
        );
    }
}