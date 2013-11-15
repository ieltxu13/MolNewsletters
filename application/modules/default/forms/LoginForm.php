<?php

class Default_Form_LoginForm extends Zend_Form
{

    public function init()
    {
        
        $this->setName('Login')->setAttrib('class', 'form-signin');
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');

        $usuario = new Zend_Form_Element_Text('usuario');
        $usuario->addFilter('StripTags')->addFilter('StringTrim')->setRequired();
        $usuario->setAttribs(array(
            'class'=>'form-control',
            'placeholder'=>'Usuario',
            'autofocus'=>'true',
            )
        );

        $contrasenia = new Zend_Form_Element_Password('clave');
        $contrasenia->addFilter('StripTags')->addFilter('StringTrim')->setRequired();
        $contrasenia->setAttribs(array(
            'class'=>'form-control',
            'placeholder'=>'Contraseña',
            )
        );

        $submit = new Zend_Form_Element_Submit('Ingresar');
        $submit->setAttrib('class', 'btn btn-lg btn-primary btn-block');
        
        $this->addElements(array($usuario, $contrasenia, $submit));

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

