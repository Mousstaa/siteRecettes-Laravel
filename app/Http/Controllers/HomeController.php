<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){

        $recipes = \App\Models\Recipe::take(3)->latest()->get(); //Seuls les 3 dernières recettes doivents être affichés

        //passer une variable à une vue
        return view('welcome',array(
            'recipes' => $recipes
        ));
    }
}
