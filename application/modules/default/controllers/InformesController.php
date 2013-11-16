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
        $this->view->mensajes = $this->_helper->flashMessenger->getMessages();
    }

    public function agregarImagen() {

        if (!$this->_getParam('id')) {

            $this->_helper->redirector('index');

            $this->_helper->flashMessenger->addMessages('error');
        }

        $idInforme = $this->getParam('id');



        $form = new Default_Form_ImagenForm();

        $this->view->formimagen() = $form;

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
    
    public function nuevoInforme(){
        $form = new Default_Form_InformeForm();

        $this->view->formInforme() = $form;

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

}

