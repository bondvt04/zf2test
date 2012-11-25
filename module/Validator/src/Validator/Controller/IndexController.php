<?php

namespace Validator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class IndexController extends AbstractActionController
{
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        $this->init();
        
        $translate = new \Zend\I18n\Translator\Translator();
        $translate->setLocale('ru_RU');
        $lang = 'ru';
        $translate->addTranslationFile("phparray", './module/Validator/language/lang.array.'.$lang.'.php');
        
        $email = 'Жека@МЫЛО.РФ';
        $validator = new \Zend\Validator\EmailAddress();
        $validator->setTranslator($translate);
        
        
        
        
        
        $isValid = $validator->isValid($email);
        printf("isValid = %b", $isValid);
        if(!$isValid) {
            \Zend\Debug\Debug::dump($validator->getMessages());
        }
        
        
        $validator2 = new \Zend\Validator\Callback(function($value) {
            if(is_int($value) && $value > 10) {
                return true;
            }
            return false;
        });
        $validator2->setMessage('Не канает! Гони вместо %value% целое число большее, чем 10', \Zend\Validator\Callback::INVALID_VALUE);
        if (!$validator2->isValid(8)) {
            \Zend\Debug\Debug::dump($validator2->getMessages());
        }
        
        exit();

        return new ViewModel(array(
            'txt' => nl2br($table),
        ));
    }
    
}
