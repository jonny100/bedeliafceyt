<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PrestamoAdminController extends Controller
{
    
   
    
   public function devolverAction()
    {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('No se puede encontrar el objeto con id : %s', $id));
        }

        //$clonedObject = clone $object;  // Careful, you may need to overload the __clone method of your object
                                        // to set its id to null
        $horadevolucion = new \DateTime("now");
        
        $object->sethoraDevuelve($horadevolucion);
        
        $object->setquienDevuelve($object->getquienRetira());

        $em = $this->admin->getModelManager()->getEntityManager('AdminAdminBundle:Prestamo');
        
        $em->persist($object);
        
        $em->flush();

        $this->addFlash('sonata_flash_success', 'Actualizado con exito');

        return new RedirectResponse($this->admin->generateUrl('list'));
    }
    
}