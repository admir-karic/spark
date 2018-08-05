<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Review extends Pivot
{
	protected $fillable = [
        'value', 'comment',
    ];
}
