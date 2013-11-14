<?php

class Default_AsyncController extends Zend_Controller_Action
{

    public function init()
    {
       $this->_helper->viewRenderer->setNoRender(true);
       $this->_helper->getHelper('layout')->disableLayout();
    }

    public function indexAction()
    {
        
    }
    
    public function validarformAction()
    {
        
        $form = ucfirst($this->_getParam('form'));
        //$mca = $this->_getParam('mca');
        //$module = ucfirst($mca[3]);
        //$module = ucfirst($mca[1]);
        $clase = 'Default_Form_'.$form.'Form';
        
        $f = new $clase();
        $f->isValid($this->_getAllParams());
        $json = $f->getMessages();
        //para decirle al browser que vamos a mandarle contenido json
        header('Content-Type: application/json;charset=utf-8_spanish_ci');
        echo Zend_Json::encode($json);
    }


}

