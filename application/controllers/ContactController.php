<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Contact();
        $this->view->form = $form;
        
        // controle en mail versturen
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                echo '<pre>';
                print_r($params);
                echo '</pre>';
                die();
            }
        }
    }


}

