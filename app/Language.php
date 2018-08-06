<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
    ];

	public function games()
	{
		return $this->belongsToMany('App\Game','game_languages','language_id','game_id');
	}
}
