<?php

class Nieuws1Controller extends Zend_Controller_Action
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
        
        $model = new Application_Model_Nieuws();
        $rows  = $model->fetchAll();
        
        /*$sql = "select * from nieuws";
        $db  = Zend_Registry::get('db');
        $rows = $db->fetchAll($sql); // alle rijen teruggeven
         * 
         */
        // result meesturen naar de view
        $this->view->nieuws = $rows;

        
    }

    public function toevoegenAction()
    {
        $form = new Application_Form_Nieuws();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                $model = new Application_Model_Nieuws();
                $model->insert($params);
                
                echo 'uw bericht werd toegevoegd!';
                
            }
        }
    }


}



