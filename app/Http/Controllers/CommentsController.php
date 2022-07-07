<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //enregistrer un commentaire
    public function store(Request $request){

        $comment = new Comment;

        $comment->body = $request->body;
        $comment->recipe_id = $request->id;
        $comment->save();

        //reter sur la meme page
        return back()->with('info', 'Votre commentaire a bien été publié !');;
    }
}
