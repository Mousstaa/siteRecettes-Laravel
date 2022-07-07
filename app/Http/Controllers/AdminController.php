<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = \App\Models\Recipe::orderBy('created_at', 'desc')->paginate(4);
        return view('admin/index', compact('recipes'));
    }

    //fonction pour un ajout de recette
    public function addRecipe(Request $request){

        $recipe = new Recipe();

        if($request->hasFile('image')){
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_',$fileNameOnly).'-'.rand() .'_'.time(). '.'.$extension;
            $path = $request->file('image')->move(public_path('media'),$comPic);
            $recipe->image = $comPic;
        }

        $recipe->title = $request->title;
        $recipe->content = $request->content;
        $recipe->ingredients = $request->ingredients;
        $recipe->url = Str::random(200);
        $recipe->tags = $request->tags;
        $recipe->date = now();
        $recipe->save();

        return response()->json($recipe);

    }

    //Methode pour recuperer les donnees d'une recette a fin de les modifier
    public function getRecipeById($id){
        $recipe = Recipe::find($id);
        return response()->json($recipe);
    }

    //modifier une recette
    public function updateRecipe(Request $request){

        $recipe = Recipe::find($request->id);
        $recipe->title = $request->title;
        $recipe->content = $request->content;
        $recipe->ingredients = $request->ingredients;
        $recipe->tags = $request->tags;
        $recipe->save();

        return response()->json($recipe);

    }

    //supprimer une recette
    public function deleteRecipe($id){

        $recipe = Recipe::find($id);
        $recipe->delete();

        return response()->json(['success'=>'La recette a bien été supprimé !']);

    }

     //function pour la recherch
     public function search(){

        $search_text = $_GET['query'];
        $recipes = Recipe::where('tags', 'LIKE', '%'.$search_text.'%')->orderBy('created_at', 'desc')->paginate(8);;

        return view('admin.searchadmin', compact('recipes'));
    }

}
