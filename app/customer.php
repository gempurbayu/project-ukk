<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'gender'
    ];
}
