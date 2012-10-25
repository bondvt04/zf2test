<?php

namespace Tasks\Form;

use Zend\Form\Form;

class TasksForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('tasks');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'task',
            'attributes' => array(
                'type'  => 'text',
                'required' => 'required',
                'pattern'  => '^0[1-68]([-. ]?[0-9]{2}){4}$',
            ),
            'options' => array(
                'label' => 'Task',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}