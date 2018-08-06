<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerNumber extends Model
{
    protected $table = 'player_numbers';

	protected $fillable = [
        'name',
    ];

	public function games()
    {
        return $this->hasMany('App\Game');
    }
}
