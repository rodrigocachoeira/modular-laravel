<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfigEmailIdForeignKeyInConfigEmailSignatures extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('config_email_signatures', function (Blueprint $table) {
          $table->foreign( 'config_email_id' )->references( 'id' )->on( 'config_emails' )->onDelete( 'cascade' );
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('config_email_signatures', function (Blueprint $table) {
          $table->dropForeign('config_email_signatures_config_email_id_foreign');
      });
  }
}
