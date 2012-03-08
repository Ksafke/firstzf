<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        // VOORNAAM
        $this->addElement(new Zend_Form_Element_Text('voornaam',array(
            'label' => 'Voornaam',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        // NAAM
        $this->addElement(new Zend_Form_Element_Text('naam',array(
            'label' => 'Naam',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        // EMAIL
        $this->addElement(new Zend_Form_Element_Text('email',array(
            'label' => 'E-mail',
            'filters' => array('stringTrim'),
            'Validators' => array(
             array('EmailAddress'), // controle op email
             array('StringLength',true,array('max' => 50)) // max 50 tekens
            ),
            'required' => true
        )));
        
        $btn = new Zend_Form_Element_Button('submit',array(
            'type' => 'submit',
            'value' => 'Stuur mail',
            'required' => false,
            'ignore'  => true,
        ));
        
        $this->addElement($btn);
        
    }


}

