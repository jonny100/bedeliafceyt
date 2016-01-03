<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HorarioAdminController extends CRUDController
{
   public function calendarAction(){
       return $this->render('AdminAdminBundle:HorarioAdmin:calendar.html.twig', array());
}
    
}