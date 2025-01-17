<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoanApplicationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LoanApplicationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LoanApplicationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\LoanApplication::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/loan-application');
        CRUD::setEntityNameStrings('loan application', 'loan applications');
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
            'label' => 'Application Date',
            'name' => 'application_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Loan Amount',
            'name' => 'loan_amount',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Interest Rate',
            'name' => 'interest_rate',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Loan Term Years',
            'name' => 'loan_term_years',
            'type' => 'number'
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Property",
            'type'      => 'select',
            'name'      => 'property_id', // the db column for the foreign key
            'entity'    => 'Property',
            'model'     => "App\Models\Property", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Bank",
            'type'      => 'select',
            'name'      => 'bank_id', // the db column for the foreign key
            'entity'    => 'Bank',
            'model'     => "App\Models\Bank", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'approved' => 'Approved','rejected' => 'Rejected'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([
            'label' => 'Application Date',
            'name' => 'application_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Loan Amount',
            'name' => 'loan_amount',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Interest Rate',
            'name' => 'interest_rate',
            'type' => 'number'
        ]);

        CRUD::column([
            'label' => 'Loan Term Years',
            'name' => 'loan_term_years',
            'type' => 'number'
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Property",
            'type'      => 'select',
            'name'      => 'property_id', // the db column for the foreign key
            'entity'    => 'Property',
            'model'     => "App\Models\Property", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Bank",
            'type'      => 'select',
            'name'      => 'bank_id', // the db column for the foreign key
            'entity'    => 'Bank',
            'model'     => "App\Models\Bank", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'approved' => 'Approved','rejected' => 'Rejected'],
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
        CRUD::setValidation(LoanApplicationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Property",
            'type'      => 'select',
            'name'      => 'property_id', // the db column for the foreign key
            'entity'    => 'Property',
            'model'     => "App\Models\Property", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Bank",
            'type'      => 'select',
            'name'      => 'bank_id', // the db column for the foreign key
            'entity'    => 'Bank',
            'model'     => "App\Models\Bank", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([
            'label' => 'Loan Amount',
            'name' => 'loan_amount',
            'type' => 'number'
        ]);

        CRUD::field([
            'label' => 'Interest Rate',
            'name' => 'interest_rate',
            'type' => 'number'
        ]);

        CRUD::field([
            'label' => 'Loan Term Years',
            'name' => 'loan_term_years',
            'type' => 'number'
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['pending' => 'Pending', 'approved' => 'Approved','rejected' => 'Rejected'],
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
