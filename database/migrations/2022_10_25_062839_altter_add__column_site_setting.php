<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AltterAddColumnSiteSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('site_settings', function (Blueprint $table) {
            //
            $table->text('minium_review_character')->nullable()->after('id');
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
        if (Schema::hasColumn('site_settings', 'minium_review_character'))
        {
            Schema::table('site_settings', function (Blueprint $table) {
                //
                $table->dropColumn('minium_review_character');
            });
        }
    }
}
