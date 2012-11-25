<?php

namespace ServiceManager\Zlo;

use Zend\ServiceManager\FactoryInterface;

class Hello implements FactoryInterface
{
    static public $count = 0;
    
    public function __construct()
    {
        self::$count++;
    }
    
    static public function getCount()
    {
        return self::$count;
    }
    
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        return $this->get(new $this());
    }
}