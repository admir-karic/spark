<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{	
    protected $fillable = [
        'name', 'developer', 'release_date','price','image','specification_id','player_number_id',
    ];
	
	protected $hidden =[
		'price',
	];

	public function categories()
	{
		return $this->belongsToMany('App\Category','game_categories','game_id','category_id');
	}

	public function languages()
	{
		return $this->belongsToMany('App\Language','game_languages','game_id','language_id');
	}

	public function orders()
	{
		return $this->belongsToMany('App\Order','game_orders','game_id','order_id');
	}

	public function users()
	{
		return $this->belongsToMany('App\User','reviews','game_id','user_id')->withPivot('value', 'comment')->using('App\Review');
	}
	public function specification()
    {
        return $this->belongsTo('App\Specification');
    }

	public function player_number()
    {
        return $this->belongsTo('App\PlayerNumber');
    }

}
