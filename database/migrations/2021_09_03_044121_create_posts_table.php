<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
          $table->id();
          $table-> string('status', 250)->nullable();
          $table-> string('photo', 250)->nullable();
          $table-> json('likes')->nullable();
          $table-> integer('comments')->default(0);
          $table-> integer('user_id');
          $table-> dateTime('created_at')->useCurrent();
          $table-> dateTime('updated_at')->useCurrent();
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
