<?php 
// src/AppBundle/Admin/CategoryAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ThemeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
            $formMapper
        ->with('Nom du thème:')
            ->add('name', 'text')
        ->end()

        ->with('Relation:')
            ->add('category', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Category',
                'property' => 'getName',
            ))
        ->end();


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('category');

    }
}