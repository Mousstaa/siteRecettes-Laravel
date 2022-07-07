<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->nullable();
            $table->mediumText('title');
            $table->longText('content');
            $table->longText('ingredients');
            $table->string('url', 200);
            $table->text('tags');
            $table->string('image')->nullable();
            $table->dateTime('date');
            $table->string('status', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
