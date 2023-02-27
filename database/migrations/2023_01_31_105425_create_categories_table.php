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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
			$table->string('title', 100)->unique();
			$table->string('slug', 100)->unique();
			$table->integer('parent_id');
						$table->string('language', 2);
			$table->bigInteger('totalcategory_id')->unsigned();
            $table->timestamps();
									$table->foreign('totalcategory_id')
			->references('id')
			->on('totalcategories')
			->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
