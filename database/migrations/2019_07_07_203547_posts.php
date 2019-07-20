<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint   $table ){
               

               $table->bigIncrements('id');

               $table->string('post_titile');

               $table->string('description');

               $table->string('post_content');

               $table->string('posted_by');

               $table->string('category_id');

               $table->string('image'); 

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
        //
    }
}
