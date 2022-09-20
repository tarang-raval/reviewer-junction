<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_review_per_day')->unsigned()->nullable();
            $table->decimal('one_points_equal_money')->unsigned()->nullable();
            $table->integer('no_of_days_account_redeem_points')->unsigned();
            $table->double('minimum_points_required_to_redeem')->nullable();
            $table->integer('no_of_review_show_as_guest')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
}
