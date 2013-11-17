<?php

class Default_Form_ImagenForm extends Zend_Form {

    public function init() {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName("Imagen");

        $resumen = new Zend_Form_Element_Text('resumen');
        $resumen
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Resumen',
                    'autofocus' => 'true',
        ));


        $this->setAttrib('enctype', 'multipart/form-data');
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Elegir Imagen')
                ->setRequired()
                ->setDestination(BASE_PATH . '/img/imagenesInformes')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'jpg,png,gif')
                ->addValidator('NotExists', false, array('/'))
                ->addFilter(new My_Filter_File_Resize(array(
                    'width' => 580,
                    'height' => 300,
                    'keepRatio' => true,
                    'keepSmaller' => true
        )));
        /*  ->addFilter(new Zend_Filter_File_Rename(array(
          'target' => Zend_Auth::getInstance()>getIdentity()>id.'.jpg'
          )));//Formatos que se pueden subir */

        $submit = new Zend_Form_Element_Submit('Subir');
        $submit->setAttrib('class', 'btn btn-primary');

        $this->addElements(array($resumen, $upload, $submit));
    }

}

