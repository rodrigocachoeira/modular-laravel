<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigEmailsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('config_emails', function (Blueprint $table) {
        $table->increments('id');
        $table->string('drive', 20);
        $table->string('host', 50);
        $table->integer('port');
        $table->string('username');
        $table->string('password');
        $table->string('crypt', 20);
        $table->text('description');
        $table->string('identify');

        $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('config_emails');
  }
}
