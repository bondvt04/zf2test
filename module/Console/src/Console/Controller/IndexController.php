<?php

namespace Console\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest;

class IndexController extends AbstractActionController
{

    public function getSummAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $arg1   = $request->getParam('arg1', 0);
        $arg2   = $request->getParam('arg2', 0);
        if(true == $request->getParam('verbose')
            || true == $request->getParam('v')
        ) {
            $verbose = true;
        } else {
            $verbose = false;
        }
        
        
        if(!$verbose) {
            echo (double) ($arg1 + $arg2);
        } else {
            $result = (double) ($arg1 + $arg2);
            echo "{$arg1} + {$arg2} = {$result}";
        }
    }
    
    public function getCntAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        if(true == $request->getParam('verbose')
            || true == $request->getParam('v')
        ) {
            $verbose = true;
        } else {
            $verbose = false;
        }
        
        if(!$verbose) {
            $command = "ls ./module | wc -l";
            echo system($command, $returnCode);
        } else {
            $command = "ls ./module | wc -l";
            echo sprintf('There are %s modules', system($command, $returnCode));
        }
    }
}
