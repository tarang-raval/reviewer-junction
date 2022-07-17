<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('categories', function (Blueprint $table) {
            //

            $table->string('slug')->nullable()->after('name');

        });
        Schema::table('subcategories', function (Blueprint $table) {
            //

            $table->string('slug')->after('name')->nullable()->nullable();

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
        if (Schema::hasColumn('categories', 'slug'))
        {
            Schema::table('categories', function (Blueprint $table) {
                //
                $table->dropColumn('slug');
            });
        }
        if (Schema::hasColumn('subcategories', 'slug'))
        {
            Schema::table('subcategories', function (Blueprint $table) {
                //
                $table->dropColumn('slug');
            });
        }

    }
}
