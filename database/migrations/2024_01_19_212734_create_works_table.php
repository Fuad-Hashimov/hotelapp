<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('works')) {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->bigInteger('customers_id')->unsigned();
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
