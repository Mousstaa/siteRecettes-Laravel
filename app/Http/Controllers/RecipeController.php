<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){

        //récupérer des données d’un modèle
        $recipes = \App\Models\Recipe::orderBy('created_at', 'desc')->paginate(8);

        //passer une variable à une vue
        return view('recipes/index',array(
            'recipes' => $recipes
        ));
    }

    public function show($recipe_name) {

        $recipe = \App\Models\Recipe::where('url',$recipe_name)->first(); //get first recipe with recipe_nam == $recipe_name

        //récupérer l id de l’auteur d’une recette
        $author = \App\Models\User::find($recipe->author_id);

        return view('recipes/single',array( //Pass the recipe to the view
         'recipe' => $recipe,
         'author' => $author
        ));
     }

     //function pour la recherch par tags
     public function search(){

        $search_text = $_GET['query'];
        $recipes = Recipe::where('tags', 'LIKE', '%'.$search_text.'%')->orderBy('created_at', 'desc')->get();

        return view('recipes.search', compact('recipes'));
     }


}
