<?php

class NieuwsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // logica
        
        $naam = "Xavier";
        // meesturen naar de view
        $this->view->naam = $naam;
        
        $sql = "select * from nieuws";
        $db  = Zend_Registry::get('db');
        $rows = $db->fetchAll($sql); // alle rijen teruggeven
        // result meesturen naar de view
        $this->view->nieuws = $rows;

        
    }

    public function toevoegenAction()
    {
        $form = new Application_Form_Nieuws();
        $this->view->form = $form;
    }


}



