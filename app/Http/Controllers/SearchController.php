<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
	public function index()
	{
		return view('bannedUsers');
	}

	public function search(Request $request)
	{

		if($request->ajax())
			{
				$output="";
				$users=DB::table('users')->where('username','LIKE','%'.$request->search."%")->get();
				if($users)
				{
					foreach ($users as $key => $user) 
					{
						if ($user->banned ==true)
						{
							$output.='<tr>'.
							'<td>'.$user->username.'</td>'.
							'<td>'.$user->email.'</td>'.
							'</tr>';
						}
					}
				return Response($output);
				}
			}
	}
}