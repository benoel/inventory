<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndNoteCoumnInProductreturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_returs', function (Blueprint $table) {
            $table->string('status', 10)->default('open')->after('number');
            $table->text('note')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_returs', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('note');
        });
    }
}
