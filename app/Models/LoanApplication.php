<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use CrudTrait;
    protected $table = 'loan_applications';

    protected $fillable = [
        'application_date','customer_id','property_id','bank_id','loan_amount','interest_rate','loan_term_years','status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function export($crud = false)
    {
        return '<a class="btn btn-primary" target="_blank" href="'.route('application.export').'">Download PDF</a>';
    }
}
