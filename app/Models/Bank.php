<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use CrudTrait;
    protected $table = 'banks';

    protected $fillable = [
        'name','contact_number'
    ];
}
