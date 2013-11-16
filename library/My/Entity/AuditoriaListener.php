<?php

namespace My\Entity;


/**
 * Description of Auditoria
 *
 * @author Ieltxu Algañarás
 */
class AuditoriaListener {
    
    /**
     * @var Doctrine\ORM\EntityManager
     *
     */
    protected $_em = null;
    
    public function onFlush(\Doctrine\ORM\Event\OnFlushEventArgs $eventArgs)
    {
        $this->_em = $eventArgs->getEntityManager();
        $uow = $this->_em->getUnitOfWork();
        foreach ($uow->getScheduledEntityInsertions() AS $entity) {
            $auditoria = new Auditoria();
            $auditoria->setIdEntidad($entity->getId());
            $auditoria->setEntidad(get_class($entity));
            $auditoria->setUsuario(\Zend_Auth::getInstance()->getIdentity()->getUsuario());
            $auditoria->setAccion('A');
            
            $this->_em->persist($auditoria);
            
            $uow->computeChangeSet($this->_em->getClassMetadata('My\Entity\Auditoria'), $auditoria);
        }

        foreach ($uow->getScheduledEntityUpdates() AS $entity) {
            $auditoria = new Auditoria();
            $auditoria->setIdEntidad($entity->getId());
            $auditoria->setEntidad(get_class($entity));
            $auditoria->setUsuario(\Zend_Auth::getInstance()->getIdentity()->getUsuario());
            $auditoria->setAccion('M');
            
            $this->_em->persist($auditoria);
            
            $uow->computeChangeSet($this->_em->getClassMetadata('My\Entity\Auditoria'), $auditoria);
        }

        foreach ($uow->getScheduledEntityDeletions() AS $entity) {

        }

        foreach ($uow->getScheduledCollectionDeletions() AS $col) {

        }

        foreach ($uow->getScheduledCollectionUpdates() AS $col) {

        }
    }
}
