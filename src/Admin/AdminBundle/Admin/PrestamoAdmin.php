<?php

namespace Admin\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Doctrine\ORM\EntityRepository;



class PrestamoAdmin extends Admin
{
    
     protected $datagridValues = array(
        '_page' => 1,            // display the first page (default = 1)
        '_sort_order' => 'DESC', // reverse order (default = 'ASC')
        '_sort_by' => 'id'  // name of the ordered field
                                 // (default = the model's id field, if any)

        // the '_sort_by' key can be of the form 'mySubModel.mySubSubModel.myField'.
    );
    
    protected function configureRoutes(RouteCollection $collection)
{
    $collection->add('devolver', $this->getRouterIdParameter().'/devolver');
}  
    
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('quienRetira')
            ->add('horaRetirada')
            ->add('quienDevuelve')
            ->add('horaDevuelve')
            ->add('observaciones')
            ->add('fecha')
            ->add('aula')
            ->add('motivoPrestamo')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
//       
        $listMapper
            ->add('aula')
            ->add('quienRetira')
            ->add('horaRetirada')
            ->add('quienDevuelve')
            ->add('horaDevuelve')
            ->add('motivoPrestamo')
            ->add('observaciones')
            ->add('fecha', null, array ('format'=>'d/m/Y'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'devolver' => array(
                    'template' => 'AdminAdminBundle:PrestamoAdmin:list__action_devolver.html.twig'
                        )
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $prestamo=$this->getSubject();
        $editar=false;
        if($prestamo->getId()){
            $editar=true;
        }
        
        $formMapper
            ->add('aula')
            ->add('quienRetira')
            ->ifTrue($editar)
                ->add('horaRetirada', 'sonata_type_time_picker', array('time_format' => 'g:i A'))
                ->add('quienDevuelve')
                ->add('horaDevuelve', 'sonata_type_time_picker', array('time_format' => 'g:i A','required' => false))
            ->ifEnd()
            ->add('motivoPrestamo')
            ->add('observaciones')
            ->ifTrue($editar)
                ->add('fecha', 'sonata_type_date_picker', array('dp_language'=>'es', 'format'=>'dd/MM/yyyy'))
            ->add('horaDevuelve', 'sonata_type_time_picker', array('time_format' => 'g:i A', 'required' => false))
            ->ifEnd()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('quienRetira')
            ->add('horaRetirada')
            ->add('quienDevuelve')
            ->add('horaDevuelve')
            ->add('observaciones')
            ->add('fecha', null, array ('format'=>'d/m/Y'))
            ->add('aula')
            ->add('motivoPrestamo')
        ;
    }
    
    
    
}
