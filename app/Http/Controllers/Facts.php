<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Facts extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
		$users = DB::table('users')->count();
		$games = DB::table('games')->count();
		$reviews = DB::table('reviews')->count();
		$about = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae velit purus. Mauris vehicula enim felis, at convallis tellus ultrices et. Proin maximus elit iaculis neque lacinia hendrerit. Nunc hendrerit leo et leo imperdiet sodales. Morbi ut lectus tempor turpis egestas aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam efficitur consequat lectus ac posuere. Vestibulum a interdum orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus commodo elit non mattis maximus. Nullam vulputate neque viverra quam fermentum sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc pretium felis in ante fermentum, a facilisis lacus iaculis. Pellentesque blandit dolor at hendrerit faucibus. Maecenas semper nisl a orci posuere, et venenatis lorem interdum.';

		return view('welcome',['users'=>$users,'games'=>$games,'reviews'=>$reviews,'about'=>$about]);
    }
}
