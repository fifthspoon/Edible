<?php

    namespace Edible\Http\Controllers;

    use Illuminate\Support\Facades\DB;

    use Illuminate\Http\Request;

    use Edible\Recipe;

    use Edible\User;

    class AdminController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }
        public function admin()
        {
             $recipes = Recipe::all();

            return view('admin', compact('recipes'));
        }

         public function delete()
        {
  
            $findRecipe = $_GET['findRecipe'];

            $recipeRemove = DB::delete('DELETE FROM recipes WHERE id ='. $findRecipe . ' ');
                     
            $recipes = Recipe::all();

            return view('admin', compact('recipes'));
        }
    }