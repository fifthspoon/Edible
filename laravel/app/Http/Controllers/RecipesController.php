<?php
 
namespace Edible\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Auth;

use Edible\Recipe;

use Edible\User;

class RecipesController extends Controller
{

    public function index()
    {
        $recipes = Recipe::all();
 
        return view('welcome', compact('recipes'));
    }
 
 
    public function getByCategoryMeat()
    {
 
 $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('category', '=', 'meat')
                     ->get();
 
 
        return view('meat', compact('recipes'));
       
 
    }
 
    public function getByCategoryFish()
    {
 
 $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('category', '=', 'fish')
                     ->get();
 
 
        return view('fish', compact('recipes'));
       
 
    }
 
         public function getMyRecipe()
    {
 
 $userWho = Auth::user()->name;
 
 $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('createdby', '=', $userWho)
                     ->get();
 
 
        return view('myrecipe', compact('recipes'));
       
 
    }
 
    public function store() {
 
        $recipe = new Recipe();
 
        $recipe->title = request('title');
 
        $recipe->category = request('category');
 
        $recipe->content = request('content');
 
        $recipe->picture = request('picture');
 
        $recipe->createdby = request('createdby');
 
        $recipe->save();
 
        return redirect('/welcome');
    }

    public function search()
    {
 
    $search = $_GET['search'];
 
    $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('title', '=', $search)
                     ->get();
 
 
        return view('search', compact('recipes'));
       
 
    }   
}