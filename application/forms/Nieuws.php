<?php

class Application_Form_Nieuws extends Zend_Form
{

    public function init()
    {
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        // TITEL
        $this->addElement(new Zend_Form_Element_Text('titel',array(
            'label' => 'Titel',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        // OMSCHRIJVING
        $this->addElement(new Zend_Form_Element_TextArea('omschrijving',array(
            'label' => 'Omschrijving',
            'rows' => 10,
            'cols' => 30,
            'filters' => array('stringTrim'),
            'required' => true
        )));
        // DATE
        $this->addElement(new Zend_Form_Element_Text('datum',array(
            'label' => 'Datum',
            'filters' => array('stringTrim'),
            'Validators' => array(
             array('Date'), // controle op datum
             array('StringLength',true,array('max' => 50)) // max 50 tekens
            ),
            'required' => true
        )));
        
        $btn = new Zend_Form_Element_Button('submit',array(
            'type' => 'submit',
            'value' => 'Nieuws toevoegen',
            'required' => false,
            'ignore'  => true,
        ));
        
        $this->addElement($btn);
        
    }


}

