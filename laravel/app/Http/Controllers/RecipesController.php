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
 
    public function store()
    {
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

    public function udelete()
    {
        $findRecipe = $_GET['findRecipe'];
        $recipeRemove = DB::delete('DELETE FROM recipes WHERE id ='. $findRecipe . ' ');    
        $userWho = Auth::user()->name;
        $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('createdby', '=', $userWho)
                     ->get();
 
        return view('myrecipe', compact('recipes'));
    }

    public function editRecipe()
    {
        $findRecipe = $_GET['findRecipe'];
        $recipes = DB::table('recipes')
                     ->select(DB::raw('*'))
                     ->where('id', '=', $findRecipe)
                     ->get();

        return view('edit_recipe', compact('recipes'));
    }

    public function uedit()
    {
        $findRecipe = $_POST['findRecipe'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $picture = $_POST['picture'];
        $editRecipes = DB::update("UPDATE recipes SET title='$title', content='$content', category='$category' , picture='$picture' WHERE id= $findRecipe ");
   
        $userWho = Auth::user()->name;
        $recipes = DB::table('recipes')
                            ->select(DB::raw('*'))
                            ->where('createdby', '=', $userWho)
                            ->get();
 
         return view('myrecipe', compact('recipes'));
    }
}