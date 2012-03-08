<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function sitemapAction()
    {
        // layout voor deze pagina uitschakelen
        $this->getHelper('layout')->disableLayout();
    }


}



