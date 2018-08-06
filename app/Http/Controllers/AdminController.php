<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Game;
use App\Specification;
use App\PlayerNumber;
use App\Category;
use App\Language;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

	/*     USERS     */

    public function getUsers()
	{
		$users=User::where('type','registered')->get();

		return view('users',['users'=>$users]);
	}

	public function banUser($id)
	{
		$user=User::findOrFail($id);
		if($user->banned == false)
		{
			$user->banned=true;
			$user->save();
		}
		return redirect()->back();
	}

	public function unbanUser($id)
	{
		$user=User::findOrFail($id);
		if($user->banned == true)
		{
			$user->banned=false;
			$user->save();
		}
		return redirect()->back();
	}

	public function getBannedUsers()
	{
		$users=User::where('banned',true)->get();
		return view('bannedUsers',['users'=>$users]);
	}
	
	public function searchUser(Request $request)
	{
		$username=$request->input('username');
		$users=User::where('username','LIKE','%'.$username."%")->where('banned',true)->get();
		return view('bannedUsers',['users'=>$users]);
	}

	/*     GAMES     */

	public function getGames()
	{
		$games=Game::all();
		return view('games',['games'=>$games]);
	}

	public function editGame($id)
	{
		$game=Game::findOrFail($id);
		$specifications=Specification::all();
		$playerNumbers=PlayerNumber::all();
		return view('editGame',['game'=>$game,'specifications'=>$specifications,'playerNumbers'=>$playerNumbers]);
	}

	public function saveGame(Request $request,$id)
	{
		$request->validate([
            'gamename' => 'required|string|min:3|max:40',
			'developer' => 'required|string|min:3|max:40',
			'date'=> 'required|date|before:tomorrow',
			'price' => 'required|numeric|gte:0',
            'imagefile' => 'required|image'
        ]);

		$game=Game::findOrFail($id);
		$game->name=$request->input('gamename');
		$game->developer=$request->input('developer');
		$game->release_date=$request->input('date');
		$game->price=$request->input('price');
		$game->specification_id=$request->input('specification');
		$game->player_number_id=$request->input('playernumber');
		if($request->imagefile) 
		{
		Storage::delete('public/images/'.$game->image);
		$request->imagefile->storeAs('public/images/', $game->image);
		}
		$game->save();

		return redirect('admin/games');
	}

	public function addGame()
	{
		$specifications=Specification::all();
		$playerNumbers=PlayerNumber::all();
		return view('addGame',['specifications'=>$specifications,'playerNumbers'=>$playerNumbers]);
	}

	public function addNewGame(Request $request)
	{
		$request->validate([
            'gamename' => 'required|string|min:3|max:40',
			'developer' => 'required|string|min:3|max:40',
			'date'=> 'required|date|before:tomorrow',
			'price' => 'required|numeric|gte:0',
            'imagefile' => 'required|image'
        ]);

		$count=DB::table('games')->count();
		$count+=1;
		$game= new Game();
		$game->name=$request->input('gamename');
		$game->developer=$request->input('developer');
		$game->release_date=$request->input('date');
		$game->price=$request->input('price');
		$game->specification_id=$request->input('specification');
		$game->player_number_id=$request->input('playernumber');
		$game->image='image'.$count.'.jpg';
		$request->imagefile->storeAs('public/images/', $game->image);
		
		$game->save();

		return redirect('admin/add-game');
	}

	public function deleteGame($id)
	{
		$game=Game::findOrFail($id);
		Storage::delete('public/images/'.$game->image);
		$game->delete();

		return redirect('admin/games');
	}

	public function searchGames(Request $request)
	{
		$gamename=$request->input('gamename');
		$games=Game::where('name','LIKE','%'.$gamename."%")->get();
		return view('games',['games'=>$games]);
	}

	/*     CATEGORIES     */

	public function getCategories()
	{
		$categories=Category::all();
		
		return view('categories',['categories'=>$categories]);
	}

	public function searchCategories(Request $request)
	{
		$category=$request->input('category');
		$categories=Category::where('name','LIKE','%'.$category."%")->get();
		return view('categories',['categories'=>$categories]);
	}

	public function deleteCategory($id)
	{
		$category=Category::findOrFail($id);
		$category->delete();

		return redirect('admin/categories');
	}

	public function addCategory()
	{
		$categories = Category::all();
		return view('addCategory',['categories'=>$categories]);
	}

	public function saveCategory(Request $request)
	{
		$request->validate([
            'categoryname' => 'required|string|min:3|max:40',
        ]);

		$category= new Category();
		$category->name=$request->input('categoryname');
		$category->save();
		return redirect()->back();
	}

	public function addCategoryGame(){
		$categories = Category::all();
		$games=Game::all();

		return view('addCategoryGame',['categories'=>$categories,'games'=>$games]);
	}

	public function saveCategoryGame(Request $request){

		$game = Game::findOrFail($request->input('game'));
		$categories= Category::findMany($request->categories);
		foreach($categories as $category)
		{
			if($game->categories()->where('category_id',$category->id)->exists())
				return redirect('admin/add-category-game');
		}
		foreach($categories as $category)
		{
			$game->categories()->attach($category);
		}

		return redirect('admin/add-category-game');
	}

	/*     LANGUAGES     */

	public function getLanguages()
	{
		$languages=Language::all();
		
		return view('languages',['languages'=>$languages]);
	}

	public function searchLanguages(Request $request)
	{
		$language=$request->input('language');
		$languages=Language::where('name','LIKE','%'.$language."%")->get();
		return view('languages',['languages'=>$languages]);
	}

	public function deleteLanguage($id)
	{
		$language=Language::findOrFail($id);
		$language->delete();

		return redirect('admin/languages');
	}

	public function addLanguage()
	{
		$languages = Language::all();
		return view('addLanguage',['languages'=>$languages]);
	}

	public function saveLanguage(Request $request)
	{
		$request->validate([
            'languagename' => 'required|string|min:3|max:25',
        ]);

		$language= new Language();
		$language->name=$request->input('languagename');
		$language->save();
		return redirect()->back();
	}

	public function addLanguageGame(){
		$languages = Language::all();
		$games=Game::all();

		return view('addLanguageGame',['languages'=>$languages,'games'=>$games]);
	}

	public function saveLanguageGame(Request $request){

		$game = Game::findOrFail($request->input('game'));
		$languages= Language::findMany($request->languages);
		foreach($languages as $language)
		{
			if($game->languages()->where('language_id',$language->id)->exists())
				return redirect('admin/add-language-game');
		}
		foreach($languages as $language)
		{
			$game->languages()->attach($language);
		}

		return redirect('admin/add-language-game');
	}

	/*     DISCOUNTS     */

	public function getDiscounts()
	{
		$discounts=Discount::all();
		
		return view('discounts',['discounts'=>$discounts]);
	}

	public function searchDiscounts(Request $request)
	{
		$discount=$request->input('discount');
		$discounts=Discount::where('value','LIKE','%'.$discount."%")->get();
		return view('discounts',['discounts'=>$discounts]);
	}

	public function deleteDiscount($id)
	{
		$discount=Discount::findOrFail($id);
		$discount->delete();

		return redirect('admin/discounts');
	}

	public function addDiscount()
	{
		$discounts = Discount::all();
		return view('addDiscount',['discounts'=>$discounts]);
	}

	public function saveDiscount(Request $request)
	{
		$request->validate([
            'code' => 'required|string|min:3|max:25',
			'discountvalue' => 'required|numeric|gte:0'
        ]);

		$discount= new Discount();
		$discount->code=$request->input('code');
		$discount->value=$request->input('discountvalue');
		$discount->save();
		return redirect()->back();
	}

	/*     SPECIFICATIONS     */

	public function getSpecifications()
	{
		$specifications=Specification::all();
		
		return view('specifications',['specifications'=>$specifications]);
	}

	public function searchSpecifications(Request $request)
	{
		$specification=$request->input('specification');
		$specifications=Specification::where('game','LIKE','%'.$specification."%")->get();
		return view('specifications',['specifications'=>$specifications]);
	}

	public function deleteSpecification($id)
	{
		$specification=Specification::findOrFail($id);
		$specification->delete();

		return redirect('admin/specifications');
	}

	public function addSpecification()
	{
		$specifications = Specification::all();
		return view('addSpecification',['specifications'=>$specifications]);
	}

	public function saveSpecification(Request $request)
	{
		$request->validate([
            'game' => 'required|string|min:3|max:25|unique:specifications,game',
			'os' => 'required|min:3|regex:/^[A-Za-z0-9\.@() \/]+$/',
			'processor' => 'required|string|min:3',
			'memory' => 'required|string|min:3|max:15',
			'graphics' => 'required|string|min:3',
			'hd' => 'required|string|min:3|max:25',
        ]);

		$specification= new Specification();
		$specification->game=$request->input('game');
		$specification->os=$request->input('os');
		$specification->processor=$request->input('processor');
		$specification->memory=$request->input('memory');
		$specification->graphics=$request->input('graphics');
		$specification->hard_drive=$request->input('hd');
		$specification->save();
		return redirect()->back();
	}

	/*     PLAYER NUMBER     */

	public function getPlayerNumbers()
	{
		$playerNumbers=PlayerNumber::all();
		
		return view('playerNumbers',['playerNumbers'=>$playerNumbers]);
	}

	public function searchPlayerNumbers(Request $request)
	{
		$playerNumber=$request->input('playernumber');
		$playerNumbers=PlayerNumber::where('name','LIKE','%'.$playerNumber."%")->get();
		return view('playerNumbers',['playerNumbers'=>$playerNumbers]);
	}

	public function deletePlayerNumber($id)
	{
		$playerNumber=PlayerNumber::findOrFail($id);
		$playerNumber->delete();

		return redirect('admin/player-numbers');
	}

	public function addPlayerNumber()
	{
		$playerNumbers = PlayerNumber::all();
		return view('addPlayerNumber',['playerNumbers'=>$playerNumbers]);
	}

	public function savePlayerNumber(Request $request)
	{
		$request->validate([
            'playernumbername' => 'required|string|min:3|max:25',
        ]);

		$playerNumber= new PlayerNumber();
		$playerNumber->name=$request->input('playernumbername');
		$playerNumber->save();
		return redirect()->back();
	}
}
