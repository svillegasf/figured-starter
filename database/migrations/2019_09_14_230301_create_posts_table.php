<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{


    protected $connection = 'mongodb';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->text('contents');
            $table->dateTime('published_date')->nullable()->default(null);
            $table->string('user_id')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->json('tags');
            $table->integer('views');
            $table->enum('status',['published','draft','inactive'])->nullable()->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
