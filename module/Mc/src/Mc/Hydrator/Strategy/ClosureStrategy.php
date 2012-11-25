<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Stdlib
 */

namespace Mc\Hydrator\Strategy;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
/**
 * @category   Zend
 * @package    Zend_Stdlib
 * @subpackage Hydrator
 */
class ClosureStrategy implements StrategyInterface
{
    
    protected $extractFunc = null;
    protected $hydrateFunc = null;
    
    public function __construct($extractFunc = null, $hydrateFunc = null)
    {
        if(isset($extractFunc)) {
            if(!is_callable($extractFunc)) {
                throw new \Exception('$extractFunc must be collable');
            }
            
            $this->extractFunc = $extractFunc;
        } else {
            $this->extractFunc = function($value) {
                return $value;
            };
        }
        
        if(isset($hydrateFunc)) {
            if(!is_callable($hydrateFunc)) {
                throw new \Exception('$hydrateFunc must be collable');
            }
            
            $this->hydrateFunc = $hydrateFunc;
        } else {
            $this->hydrateFunc = function($value) {
                return $value;
            };
        }
    }
    
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        $func = $this->extractFunc;
        return $func($value);
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $func = $this->hydrateFunc;
        return $func($value);
    }
}
