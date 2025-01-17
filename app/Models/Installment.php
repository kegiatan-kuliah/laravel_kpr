<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use CrudTrait;
    protected $table = 'installments';

    protected $fillable = [
        'loan_application_id','installment_number','due_date','payment_date','amount','status'
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id');
    }
}
