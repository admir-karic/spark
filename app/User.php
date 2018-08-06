<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function games()
	{
		return $this->belongsToMany('App\Game','reviews','user_id','game_id')->withPivot('value', 'comment')->using('App\Review');
	}

	public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
