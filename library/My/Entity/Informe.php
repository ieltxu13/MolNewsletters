<?php

namespace My\Entity;

/**
 * @Entity
 */ 
class Informe {
    
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $titulo;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $copete;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $resumen;
    
    

    /**
     *
     * @var GrupoContactos
     * @OneToMany (targetEntity="Imagen", mappedBy="informe", cascade={"persist"}, fetch="EAGER")
     * 
     */
    protected $imagenes;
    
    public function __construct() {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getCopete() {
        return $this->copete;
    }

    public function setCopete($copete) {
        $this->copete = $copete;
    }

    public function getResumen() {
        return $this->resumen;
    }

    public function setResumen($resumen) {
        $this->resumen = $resumen;
    }

    public function getImagenes() {
        return $this->imagenes;
    }

    public function agregarImagen(Imagen $imagen) {
        $this->imagenes[] = $imagen;
    }


   
}
