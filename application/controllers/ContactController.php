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
              
                // body text maken
                
                $body = "<p>Info via de website</p>";
                $body .= "<p>Naam: ".$params['voornaam']. " " . $params['naam']. "</p>";
                $body .= "<p>E-mail: ".$params['email']. "</p>";
                
                //$transport = new Zend_Mail_Transport_Smtp('mail.dx-solutions.be');
                
                // mail instellen
                $mail = new Zend_Mail();
                $mail->addTo('xavier@dx-solutions.be');
                $mail->setSubject('Mail van de site');
                $mail->setBodyHtml($body);
                $mail->setFrom($params['email']);
                //$mail->send($transport); // mail versturen
                $mail->send(); // mail versturen
                
                echo "<p>Uw mail werd verzonden!";
                
            }
        }
    }


}

