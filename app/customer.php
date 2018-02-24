<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'customers';

    protected $fillable = [
    	'name' ,'address', 'phone','gender','kursi','rute_id','token',
    ];

    public function rute()
	{
		return $this->belongsTo(Rute::class);
	}

        public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
