<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->string('title');
            $table->string('slug');
            $table->string('content_type');
        });
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxonomies');
    }
}
