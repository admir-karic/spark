<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Category;
use App\User;
use App\Order;
use App\Discount;
use DB;

class ShopController extends Controller
{
    public function store()
	{
		$games=Game::all();
		return view('shop',['games'=>$games]);
	}

	public function preview($id)
	{
		$game=Game::find($id);
		return view('preview',['game'=>$game]);
	}

	public function addReview(Request $request,$id)
	{
		$user=User::find(\Auth::user()->id);
		$game=Game::find($id);
		$user->games()->attach($game,['value'=>$request->input('rating'),'comment'=>$request->input('comment')]);
		return redirect()->back();
	}

	public function addOrder(Request $request,$id)
	{
		$orders=Order::all();
		$checkIfOrder=false;
		$checkIfDiscount=false;
		$game=Game::find($id);
		$discounts=Discount::all();
		foreach($orders as $ordercheck)
		{
			if($ordercheck->user_id==\Auth::user()->id && $ordercheck->purchase_date==null)
			{
				$checkIfOrder=true;
				foreach($discounts as $discount)
				{
					if($discount->id==$ordercheck->discount_id)
					{
						$checkIfDiscount=true;
						break;
					}
				}
				break;
			}
		}
		if ($checkIfOrder)
		{
			if (!empty($request->input('discount')) )
			{
				foreach($discounts as $discount)
				{
					if($discount->code=$request->input('discount'))
						{
							if(!$checkIfDiscount)
							{
								$order->discount_id=$discount->id;
							}
							
							break;
						}
				}
			}
			foreach($orders as $oldOrder)
			{
				if($oldOrder->user_id==\Auth::user()->id)
				{
					$oldOrder->total+=$game->price;
					break;
				}
			}
			return redirect()->back();
		}
		else
		{
			$order=new Order();
			if (empty($request->input('discount')))
			{
			}
			else
			{
				$discounts=Discount::all();
				foreach($discounts as $discount)
				{
					if($discount->code=$request->input('discount'))
						{
							$order->discount_id=$discount->id;
							break;
						}
				}
			}
			$order->user_id=\Auth::user()->id;
			$order->order_date=now();
			$order->total=$game->price;
			
			$order->save();

			$getOrderId=DB::table('orders')->orderBy('id', 'desc')->first();
			$getOrder=Order::find($getOrderId->id);
			$getOrder->games()->attach($game);

			return redirect()->back();
		}
	}
}
