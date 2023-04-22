<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $fillable= ['name', 'age', 'sex', 'email', 'phone'];
    
}
