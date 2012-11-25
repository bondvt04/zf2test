<?php

namespace TextTable\Controller;

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
        
        $table = new \Zend\Text\Table\Table(array('columnWidths' => array(10, 20)));

        // Either simple
        $table->appendRow(array('Zend', 'Framework'));

        // Or verbose
        $row = new \Zend\Text\Table\Row();

        $row->appendColumn(new \Zend\Text\Table\Column('Zend'));
        $row->appendColumn(new \Zend\Text\Table\Column('Framework'));

        $table->appendRow($row);

        return new ViewModel(array(
            'txt' => nl2br($table),
        ));
    }
    
}
