<?php

class Default_Form_ContactoForm extends Zend_Form {

    public function init() {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Contacto');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setRequired()
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre',
                    'autofocus' => 'true',
                        )
        );

        $email = new Zend_Form_Element_Text('email');
        $email->setRequired()->addValidator('EmailAddress')
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Email',
                    'autofocus' => 'true',
                        )
        );

        $telefonos = new Zend_Form_Element_Text('telefonos');
        $telefonos
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Telefonos',
                    'autofocus' => 'true',
                        )
        );

        $sitio = new Zend_Form_Element_Text('sitio');
        $sitio
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Sitio',
                    'autofocus' => 'true',
        ));

        $otros = new Zend_Form_Element_Textarea('otros');
        $otros
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Otros',
                    'autofocus' => 'true',
        ));

        $submit = new Zend_Form_Element_Submit('Crear');
        $submit->setAttrib('class', 'btn btn-primary');

        $this->setElements(array($nombre, $email, $telefonos, $sitio, $otros, $submit));

        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit->setDecorators(array('ViewHelper',
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('emptyrow' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $this->setDecorators(
                array(
                    "FormElements",
                    array("HtmlTag", array("tag" => "table")),
                    "Form"
                )
        );
    }

}
