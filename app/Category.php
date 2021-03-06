<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	protected $fillable = [
        'name', 'description',
    ];

	public function games()
	{
		return $this->belongsToMany('App\Game','game_categories','category_id','game_id');
	}
}
