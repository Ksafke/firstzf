<?php

class NieuwsController extends Zend_Controller_Action
{

    public function init()
    {
        // OOP niet correct
        $this->form = new Application_Form_Nieuws();
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
        $form->
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                // query maken
                $sql = "insert into nieuws (titel,omschrijving,datum) 
                        VALUES 
                        ('".$params['titel']."', '".$params['omschrijving']."', '".$params['datum']."')";
                
                $db = Zend_Registry::get('db');
                // query uitvoeren
                $db->query($sql);
                
                echo 'uw bericht werd toegevoegd!';
                
            }
        }
        
    }

    public function wijzigenAction()
    {
        // cast deze var naar een integer met (int)
        $id = (int) $this->_getParam('id'); // $_GET['']
        
        $model = new Application_Model_Nieuws();
        $news = $model->find($id)->current();
        
        $news = reset($news); // make an array
            
        // $form = $this->form;
        $form = new Application_Form_Nieuws();
        $form->populate($news);
        $this->view->form = $form;
        
        
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                // beveilig 
                $where = $model->getAdapter()->quoteInto('id = ?', $id);
                $model->update($params,$where); // wegschrijven in databank
                
                echo 'Uw nieuwsbericht werd aangepast!';
                
            }
        }
        
        
    }
    
    public function verwijderAction()
    {
        $id = (int) $this->_getParam('id'); // $_GET['']
        $model = new Application_Model_Nieuws();
        
        $where = $model->getAdapter()->quoteInto('id = ?', $id);
        $model->delete($where); // wegschrijven in databank
        echo 'uw berciht werd verwijderd';
        
    }


}





