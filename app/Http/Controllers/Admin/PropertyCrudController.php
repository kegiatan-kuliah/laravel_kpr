<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PropertiesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PropertiesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PropertyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Property::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/properties');
        CRUD::setEntityNameStrings('properties', 'properties');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);
        
        CRUD::column([
            'name' => 'location',
            'label' => 'Location',
            'type' => 'text'
        ]);

        CRUD::column([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number'
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'sold' => 'Sold'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);
        
        CRUD::column([
            'name' => 'location',
            'label' => 'Location',
            'type' => 'text'
        ]);

        CRUD::column([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number'
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'sold' => 'Sold'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::column([
            'label' => 'Created',
            'name' => 'created_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
        CRUD::column([
            'label' => 'Updated',
            'name' => 'updated_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PropertiesRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number'
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['available' => 'Available', 'sold' => 'Sold'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
