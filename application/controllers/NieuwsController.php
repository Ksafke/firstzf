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
    }

    public function toevoegenAction()
    {
        // action body
    }


}



