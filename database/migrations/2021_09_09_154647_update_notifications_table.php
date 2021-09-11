<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notices', function (Blueprint $table) {
        $table->after('type', function ($table){
          $table->string('owner_image')->nullable();
          $table->string('notifiable_type')->nullable()->change();
          $table->int('notifiable_id')->nullable()->change();
          $table->timestamp('created_at')->useCurrent()->change();
          });
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
