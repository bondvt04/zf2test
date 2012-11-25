<?php

namespace Mc\Entity;

use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Mc\Hydrator\Strategy\ClosureStrategy;



class DefaultEntity extends InputFilter
{
    protected $hydrator;
    
    public function setHydrator(HydratorInterface $hydrator)
    {
        if(!($hydrator instanceof HydratorInterface)) {
            throw new \Exception(sprintf('$hydrator must implements to \Zend\Stdlib\Hydrator\HydratorInterface, %s given',
                (new \ReflectionClass($hydrator))->getName()
            ));
        }
        $this->hydrator = $hydrator;
    }
    
    public function addStrategies($strategies = array(), HydratorInterface $hydrator = null)
    {
        if(null !== $hydrator) {
            $this->setHydrator($hydrator);
        }
        
        if(count($strategies) > 0) {
            foreach ($strategies as $name => $callbacks) {
                $this->hydrator->addStrategy($name, new ClosureStrategy(
                    $callbacks['extract'],
                    $callbacks['hydrate']
                ));
            }
        }
    }
    
}