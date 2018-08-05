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
		return $this->belongsToMany('App\Category');
	}

	public function languages()
	{
		return $this->belongsToMany('App\Language');
	}

	public function orders()
	{
		return $this->belongsToMany('App\Order');
	}

	public function users()
	{
		return $this->belongsToMany('App\User')->withPivot('value', 'comment')->as('review');
	}

	public function specification()
    {
        return $this->belongsTo('App\Specification');
    }
}
