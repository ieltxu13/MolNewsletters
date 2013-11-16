<?php

class Default_Form_InformeForm extends Zend_Form
{

    public function init()
    {
       $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName("Informe");
        
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setRequired()
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Titulo',
                    'autofocus' => 'true',
                        )
        );
        
        $copete = new Zend_Form_Element_Textarea('copete');
        $copete
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Copete',
                    'rows' => 10
        ));
        
        $resumen = new Zend_Form_Element_Textarea('resumen');
        $resumen
                ->setAttribs(array(
                    'class' => 'form-control',
                    'placeholder' => 'Resumen',
                    'rows' => 30
        ));
        
        $submit = new Zend_Form_Element_Submit('Crear');
        $submit->setAttrib('class', 'btn btn-primary');

        $this->setElements(array($titulo, $copete, $resumen, $submit));

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

