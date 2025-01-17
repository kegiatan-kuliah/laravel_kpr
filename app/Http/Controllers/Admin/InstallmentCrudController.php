<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InstallmentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InstallmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InstallmentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Installment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/installment');
        CRUD::setEntityNameStrings('installment', 'installments');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([  // Select
            'label'     => "Loan Application",
            'type'      => 'select',
            'name'      => 'loan_application_id', // the db column for the foreign key
            'entity'    => 'LoanApplication',
            'model'     => "App\Models\LoanApplication", // related model
            'attribute' => 'application_date', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([
            'label' => 'Installment Number',
            'name' => 'installment_number',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Due Date',
            'name' => 'due_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Payment Date',
            'name' => 'payment_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Amount',
            'name' => 'amount',
            'type' => 'number'
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'paid' => 'Paid','late' => 'Late'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        
    }

    protected function setupShowOperation()
    {
        CRUD::column([  // Select
            'label'     => "Loan Application",
            'type'      => 'select',
            'name'      => 'loan_application_id', // the db column for the foreign key
            'entity'    => 'LoanApplication',
            'model'     => "App\Models\LoanApplication", // related model
            'attribute' => 'application_date', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([
            'label' => 'Installment Number',
            'name' => 'installment_number',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Due Date',
            'name' => 'due_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Payment Date',
            'name' => 'payment_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Amount',
            'name' => 'amount',
            'type' => 'number'
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'paid' => 'Paid','late' => 'Late'],
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
        CRUD::setValidation(InstallmentRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'paid' => 'Paid','late' => 'Late'],
            'allows_null' => false,
            'default'     => 'one',
        ]);

        CRUD::field([
            'label' => 'Amount',
            'name' => 'amount',
            'type' => 'number'
        ]);

        CRUD::field([  // Select
            'label'     => "Loan Application",
            'type'      => 'select',
            'name'      => 'loan_application_id', // the db column for the foreign key
            'entity'    => 'LoanApplication',
            'model'     => "App\Models\LoanApplication", // related model
            'attribute' => 'application_date', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
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
