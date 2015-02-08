<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PointsAdmin extends Admin
{
    protected $baseRouteName = 'sonata_points';

    protected $baseRoutePattern = 'sonata_points';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Post Title'))
            ->add('organization', 'entity', array('class' => 'ApiBundle\Entity\Organization', 'property'  => 'name'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('organization')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
//            ->add('organization')
            ->add('location', null, array('label' => 'Coordinates (longtitude, latitude)'))
            ->add('_action', 'actions',
                array(
                    'actions' => array(
                        'delete' => array('label' => 'Delete')
                    )
                ))
        ;
    }
}