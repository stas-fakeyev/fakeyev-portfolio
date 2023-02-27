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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
			$table->string('title', 100)->unique();
						$table->string('slug', 200)->unique();
			$table->string('image', 255)->nullable();
			$table->text('text')->fullText();
			$table->string('language', 2);
			$table->bigInteger('totalpost_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
            $table->timestamps();
						$table->foreign('totalpost_id')
			->references('id')
			->on('totalposts')
			->cascadeOnDelete();
			
						$table->foreign('user_id')
			->references('id')
			->on('users')
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
        Schema::dropIfExists('posts');
    }
};
