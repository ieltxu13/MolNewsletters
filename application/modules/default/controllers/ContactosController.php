<?php

class Default_ContactosController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
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
        
        if ($this->getRequest()->isPost()) {
            
            $data = $this->getRequest()->getPost(); 
            
            if ($form->isValid($data)){
                
                $contacto = new My\Entity\Contacto();
                
                $contacto->setNombre($form->nombre->getValue());
                
                $contacto->setEmail($form->email->getValue());
                $contacto->setTelefonos($form->telefonos->getValue());
                $contacto->setSitio($form->sitio->getValue());
                $contacto->setOtros($form->otros->getValue());
                
                $this->_em->persist($contacto);
                $this->_em->flush();
                
            }
        }
    }


}



