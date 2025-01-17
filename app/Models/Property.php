<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use CrudTrait;
    protected $table = 'properties';

    protected $fillable = [
        'name','location','price','status'
    ];
}
