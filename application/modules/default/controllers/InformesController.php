<?php

class Default_InformesController extends Zend_Controller_Action {

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     *
     *
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
     *
     *
     *
     */
    protected $_em = null;

    public function init() {
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction() {
        
        $query = $this->_em->createQuery('SELECT I FROM My\Entity\Informe I ORDER BY I.titulo DESC');
        
        $informes = $query->getResult();
        
        $this->view->informes = $informes;
        
        $this->view->mensajes = $this->_helper->flashMessenger->getMessages();
    }

    public function agregarImagenAction() {

        if (!$this->_getParam('id')) {

            $this->_helper->redirector('index');

            $this->_helper->flashMessenger->addMessages('error');
        }

        $idInforme = $this->getParam('id');



        $form = new Default_Form_ImagenForm();

        $this->view->formimagen = $form;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {

                $form->upload->receive();

                $imagen = new My\Entity\Imagen();

                $imagen->setResumen($form->resumen->getValue());
                $imagen->setNombre($form->upload->getFileName());

                $informe = $this->_em->find('My\Entity\Informe', $idInforme);

                $informe->agregarImagen($imagen);

                $this->_em->flush();

                $this->_helper->flashMessenger->addMessages('Imagen Agregada');

                $this->_helper->redirector('index');
            }
        }
    }
    
    public function nuevoAction(){
        $form = new Default_Form_InformeForm();

        $this->view->formInforme = $form;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {


                $informe = new My\Entity\Informe();

                $informe->setTitulo($form->titulo->getValue());
                $informe->setCopete($form->copete->getValue());
                $informe->setResumen($form->resumen->getValue());

                $this->_em->persist($informe);
                
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Informe Agregado');

                $this->_helper->redirector('index');
            }
        }
    }

}

