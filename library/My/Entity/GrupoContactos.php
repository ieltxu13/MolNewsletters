<?php

/**
 * Entidad que representa a una lista de contactos,
 * la misma contiene contactos para facilitar el envió de informes a múltiples
 * personas.
 *
 * @author root
 */
namespace My\Entity;

/**
 * @Entity
 */ 
class GrupoContactos {
    
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
     * @var Contacto
     * @ManyToMany (targetEntity="Contacto", mappedBy="listas", cascade={"persist"}, fetch="EAGER")
     */
    protected $contactos;

    
    public function __construct() {
        $this->contactos = new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function getGrupos() {
        return $this->contactos;
    }
    
    public function agregarContacto(Contactos $contactos) {
        $this->contactos[] = $contactos;
    }
    
    public function quitarContacto(Contactos $contactos) {
        $this->contactos->removeElement($contactos);
    }
}
