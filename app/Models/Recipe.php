<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes";

    protected $fillable = [
        'title','content','ingredients','tags','image'
    ];
     /**
    * Get the user that authored the recipe.
    */
   public function author()
   {
       return $this->belongsTo(User::class,'author_id');
   }

   /**
    * une recette contient un ou plusieur commentaire
    */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
