<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initView()
    {
        $view = new Zend_View(); // maak een instantie van de view
        $view->setEncoding('utf-8');
        
        // layout ophalen
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $layout->setLayout('layout');
        
        $container = new Zend_Navigation();
        // maken van de navigatie
        $urls = array(
            array('label' => 'Services',
            'action' => 'index',
            'controller' => 'services',
            'class'     => 'button-1',
            'params' => array()),
            array('label' => 'Solutions',
            'action' => 'index',
            'controller' => 'solutions',
            'class'     => 'button-2',
            'params' => array()),
            array('label' => 'Careers',
            'action' => 'index',
            'controller' => 'careers',
            'class'     => 'button-3',
            'params' => array()),
            array('label' => 'Success',
            'action' => 'index',
            'controller' => 'success',
            'class'     => 'button-4',
            'params' => array()),
            array('label' => 'Contact',
            'action' => 'index',
            'controller' => 'contact',
            'class'     => '',
            'params' => array()),
        );
        // bouw het menu op adhv bovenstaand array
        foreach ($urls as $url) {
            $page = new Zend_Navigation_Page_Mvc(array(
                'label' => $url['label'],
                'action' => $url['action'],
                'controller' => $url['controller'],
                'class'      => $url['class'],
                'route'   => 'default',
                'params'  => $url['params']
            ));
            // voeg deze toe aan de container
            $container->addPage($page); 
            
        }
        
        $view = $layout->getView();
        $view->navigation($container);
        
        //return $container;
    }
    
    public function _initDbAdapter(){
        $this->bootstrap('db');
        $db = $this->getResource('db');
        // maak een soort global variabele aan
        Zend_Registry::set('db', $db);
        
        // waar nodig 
        // $db = Zend_Registry::get('db');
    }

}

