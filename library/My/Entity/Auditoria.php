<?php

namespace My\Entity;

/**
 * @Entity
 */
class Auditoria {
    
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @Column(type="datetime", nullable=false)
     * @Timestamp
     */
    protected $fecha;
    
    protected $idEntidad;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $entidad;
    
    /**
     *
     * @var char
     * @Column(type="string", length=1)
     */
    protected $accion;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $usuario;
    
    public function __construct() {
        $this->fecha = new \DateTime(date('Y-m-d H:i:s'));
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getIdEntidad() {
        return $this->idEntidad;
    }
    
    public function setIdEntidad($idEntidad) {
        $this->idEntidad = $idEntidad;
    }
    
    public function getEntidad() {
        return $this->entidad;
    }
    
    public function setEntidad($entidad) {
        $this->entidad = $entidad;
    }
    
    public function getAccion() {
        return $this->accion;
    }
    
    public function setAccion($accion) {
        $this->accion = $accion;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function getFecha() {
        return date_format($this->fecha, 'Y-m-d H:i:s');
    }
    
    }
