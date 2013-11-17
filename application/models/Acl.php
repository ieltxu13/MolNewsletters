<?php

/**
 * Description of Acl
 *
 * @author root
 */

class Application_Model_Acl extends Zend_Acl
{
    
    public function __construct()
    {
        $this->addRole(new Zend_Acl_Role('invitado'));
        $this->addRole(new Zend_Acl_Role('usuario'),'invitado');
        
        $this->addResource(new Zend_Acl_Resource('default'))
             ->addResource(new Zend_Acl_Resource('default:index'),'default')
             ->addResource(new Zend_Acl_Resource('default:informes'),'default')
             ->addResource(new Zend_Acl_Resource('default:contactos'),'default')
             ->addResource(new Zend_Acl_Resource('default:mail'),'default')
             ->addResource(new Zend_Acl_Resource('default:async'),'default')
             ->addResource(new Zend_Acl_Resource('default:error'),'default');
        
        $this->allow('invitado', 'default:index','index')
             ->allow('invitado', 'default:error','error')
             ->allow('invitado', 'default:async','validarform')
             ->allow('invitado', 'default:informes',array('index'));
             
        
        $this
             ->allow('usuario','default:index',array('salir'))
             ->allow('usuario','default:informes',array('index','nuevo','agregar-imagen','detalle'))
             ->allow('usuario','default:contactos',array('index','nuevo'))
             ->allow('usuario','default:mail', array('index','enviar-mail'))
             ->deny('usuario','default:index',array('index'));
        
    }
}
