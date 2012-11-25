<?php

namespace Tasks\Entity;

use Zend\InputFilter\Factory as InputFactory;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use \Mc\Hydrator\Strategy\ClosureStrategy;
use \Mc\Entity\DefaultEntity;

use Tasks\Entity\PriorityEntity;

class TaskEntity extends DefaultEntity //InputFilter//implements InputFilterAwareInterface
{
    protected $hydrator;
    
    protected $inputFilter;
    
    public function __construct($options)
    {
        if(null !== $options['hydrator']) {
            $this->setHydrator($options['hydrator']);
            $this->addStrategies(array(
                'title' => array(
                    'extract' => function($value) {
                        return sprintf('<<<%s>>>', $value);
                    },
                    'hydrate' => function($value) {
                        return sprintf('<<<%s>>>', $value);
                    },
                ),
                'datetime' => array(
                    'extract' => function($value) {
                        return sprintf('--==%s==--', $value);
                    },
                    'hydrate' => function($value) {
                        return sprintf('--==%s==--', $value);
                    },
                ),
            ));
        }
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

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

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