<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
}
