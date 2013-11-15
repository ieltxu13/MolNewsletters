<?php

class Default_ContactosController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     *
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
     *
     *
     */
    protected $_em = null;

    public function init()
    {
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        $query = $this->_em->createQuery('SELECT c FROM My\Entity\Contacto c order by c.nombre DESC');
        
        $contactos = $query->getResult();
        
        $this->view->contactos = $contactos;
    }

    public function nuevoAction()
    {
        $form = new Default_Form_ContactoForm();
        
        $this->view->form = $form;
    }


}



