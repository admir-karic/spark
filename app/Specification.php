<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'os', 'processor', 'memory','graphics','hard_drive',
    ];

	public function games()
    {
        return $this->hasMany('App\Game');
    }
}
