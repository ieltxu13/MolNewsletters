<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    private $_acl = null;

    protected function _initSession()
    {
        Zend_Session::start();
    }
    
    protected function _initAutoload()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Registry::set('rol', Zend_Auth::getInstance()->getStorage()->read()->getRol());
        } else {
            Zend_Registry::set('rol', 'invitado');
        }

        $this->_acl = new Application_Model_Acl();
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new My_Controller_Plugin_AssetsGrabber());
        $fc->registerPlugin(new My_Controller_Plugin_SeccionesCheck());
        //$fc->registerPlugin(new My_Controller_Plugin_Modular_ErrorController());
        $fc->registerPlugin(new My_Controller_Plugin_AccessCheck($this->_acl));
    }
}

