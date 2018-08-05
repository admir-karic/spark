<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code', 'value',
    ];

	protected $hidden = [
        'code', 'value',
    ];

	public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
