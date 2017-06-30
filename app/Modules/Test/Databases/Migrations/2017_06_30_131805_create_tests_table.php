<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 100);
          $table->text('description');
          $table->integer('number');
          $table->float('money', 8, 2);
          $table->date('date');
          $table->boolean('available');
          $table->time('time');

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
        Schema::dropIfExists('tests');
    }
}
