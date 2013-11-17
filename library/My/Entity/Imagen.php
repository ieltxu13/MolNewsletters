<?php


namespace My\Entity;

/**
 * @Entity
 */ 
class Imagen {
    
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
     * @Column(type="text")
     */
    protected $resumen;
    
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombre;
    
    /**
     *
     * @var Contacto
     * @ManyToOne (targetEntity="Informe", inversedBy="imagenes")
     */
    protected $informe;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getResumen() {
        return $this->resumen;
    }

    public function setResumen($resumen) {
        $this->resumen = $resumen;
    }

    public function getInforme() {
        return $this->informe;
    }

    public function setInforme(Informe $informe) {
        $this->informe = $informe;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


   
}
