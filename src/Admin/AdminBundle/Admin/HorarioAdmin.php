<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;

class HorarioAdmin extends Admin {
    
//    public function getNewInstance()
//    {   
//        $object = parent::getNewInstance();
//        $object->SetAnioAcademico('2015');
//        return $object;
//    }
    
    protected $datagridValues = array(
        '_page' => 1,            // display the first page (default = 1)
        '_sort_order' => 'ASC', // reverse order (default = 'ASC')
        '_sort_by' => 'hsComienzoClase'  // name of the ordered field
                                 // (default = the model's id field, if any)

        // the '_sort_by' key can be of the form 'mySubModel.mySubSubModel.myField'.
    );

    protected $contexts = null;

    
     protected function configureRoutes(RouteCollection $collection)
    {
         $collection->add('calendar');
     }
    
    public function configure() {

        $this->setTemplate('list', 'AdminAdminBundle:HorarioAdmin:list.html.twig');
        $this->setTemplate('outer_list_rows_list', 'AdminAdminBundle:HorarioAdmin:list_outer_rows_list.html.twig');

    }
    
    
    public function createQuery($context = 'list')
    {
        $qb = parent::createQuery($context);
        $this->fecha = new \DateTime("now");
        
        $current_context = $this->getCurrentContext();
        if('vencidos' == $current_context) {
            # Creo subquery para saber todos los horaios vencidos
            $alias = $qb->getRootAlias();
            $qb->andWhere($alias . '.fechaHasta < :fecha')
               ->setParameter('fecha', $this->fecha);
        }
        
        return $qb;
    }
    
    public function getContexts() {
        if($this->contexts === null) {
            $this->contexts = array('horarios', 'vencidos');
        }
        return $this->contexts;
    }
    
    protected function getDefaultContext() {
        $c = $this->getContexts();
        return $c[0];
    }
    
    protected function getCurrentContext() {
        $pp = $this->getPersistentParameters();
        return $pp['context'];
    }
    
    public function getPersistentParameters()
    {
        $parameters = parent::getPersistentParameters();
        if (!$this->hasRequest()) {
            return $parameters;
        }
        return array_merge($parameters, array(
            'context' => $this->getRequest()->get('context', $this->getDefaultContext()),
        ));
    }
    

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('hsComienzoClase')
                ->add('hsFinalizClase')
                ->add('fechaDesde')
                ->add('fechaHasta')
                ->add('observaciones')
                ->add('anioAcademico')
                ->add('aula')
                ->add('comision')
                ->add('diaSemana')
                ->add('periodoLectivo')
                ->add('tipoClase')
                ->add('unidadAcademica')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('aula')
                ->add('diaSemana')
                ->add('hsComienzoClase')
                ->add('hsFinalizClase')
                ->add('comision')
                ->add('observaciones')
                ->add('fechaDesde', 'date', array('format'=>'d/m/y'))
                ->add('fechaHasta', 'date', array('format'=>'d/m/y'))
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

#Alta
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('aula')
                ->add('hsComienzoClase', 'sonata_type_time_picker', array('time_format' => 'g:i A'))
                ->add('hsFinalizClase', 'sonata_type_time_picker', array('time_format' => 'g:i A'))
                ->add('fechaDesde', 'sonata_type_date_picker', array('dp_language'=>'es', 'format'=>'dd/MM/yyyy'))
                ->add('fechaHasta', 'sonata_type_date_picker', array('dp_language'=>'es', 'format'=>'dd/MM/yyyy'))
                ->add('observaciones')
                ->add('anioAcademico', null, array('label' => 'Año Academico'))
                ->add('comision')
                ->add('diaSemana')
                ->add('periodoLectivo')
                ->add('tipoClase')
                ->add('unidadAcademica')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('aula')
                ->add('hsComienzoClase')
                ->add('hsFinalizClase')
                ->add('fechaDesde')
                ->add('fechaHasta')
                ->add('observaciones')
                ->add('anioAcademico')
                ->add('comision')
                ->add('diaSemana')
                ->add('periodoLectivo')
                ->add('tipoClase')
                ->add('unidadAcademica')
        ;
    }

}
