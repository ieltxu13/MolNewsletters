<?php

namespace My\Entity;

/**
 * @Entity
 */ 
class Contacto {
    
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
    protected $nombre;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $email;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $telefonos;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $sitio;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $otros;

    /**
     *
     * @var GrupoContactos
     * @ManyToMany (targetEntity="GrupoContactos", inversedBy="contactos", cascade={"persist"}, fetch="EAGER")
     * @JoinTable(name="grupoContactos_contactos")
     */
    protected $listas;
    
    public function __construct() {
        $this->listas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getTelefonos() {
        return $this->telefonos;
    }
    
    public function setTelefonos($telefonos) {
        $this->telefonos = $telefonos;
    }
    
    public function getSitio() {
        return $this->sitio;
    }
    
    public function setSitio($sitio) {
        $this->sitio = $sitio;
    }
    
    public function getOtros() {
        return $this->otros;
    }
    
    public function setOtros($otros) {
        $this->otros = $otros;
    }
    
    public function getGrupos() {
        return $this->listas;
    }
    
    public function agregarGrupo(GrupoContactos $grupoContactos) {
        $this->listas[] = $grupoContactos;
    }
    
    public function quitarGrupo(GrupoContactos $grupoContactos) {
        $this->listas->removeElement($grupoContactos);
    }
    
}
