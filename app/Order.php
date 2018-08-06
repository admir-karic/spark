<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_date', 'user_id', 'discount_id',
    ];
	//purchase_date,total,discount

	public function games()
	{
		return $this->belongsToMany('App\Game','game_orders','order_id','game_id');
	}

	public function discount()
    {
        return $this->belongsTo('App\Discount');
    }
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
