<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OrganizationAdmin extends Admin
{
    protected $baseRouteName = 'sonata_organizations';

    protected $baseRoutePattern = 'sonata_organizations';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Post Title'))
            ->add('description', 'text', array('label' => 'Post description'))
            ->add('certificate', 'text', array('label' => 'Certificate'))
            ->add('address', 'text', array('label' => 'Address'))
            ->add('phone', 'text', array('label' => 'Phone'))
            ->add('email', 'text', array('label' => 'Email'))
            ->add('website', 'text', array('label' => 'Website'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('certificate')
            ->add('address')
            ->add('phone')
            ->add('email')
            ->add('website')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('_action', 'actions',
                array(
                    'actions' => array(
                        'delete' => array('label' => 'Delete')
                    )
                ))
        ;
    }
}