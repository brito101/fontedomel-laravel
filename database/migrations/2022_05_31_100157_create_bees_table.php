<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover');
            $table->string('slug');
            $table->string('headline');
            $table->longText('content')->nullable();
            $table->integer('views')->default(0);
            /** pattern */
            $table->softDeletes();
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
        Schema::dropIfExists('bees');
    }
}
