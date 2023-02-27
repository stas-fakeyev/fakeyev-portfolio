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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
						$table->string('name', 60)->nullable();
			$table->string('email', 50)->nullable();
			$table->text('text');
						$table->integer('likes')->unsigned()->nullable();
			$table->integer('dizlikes')->unsigned()->nullable();
			$table->integer('parent_id');
			            $table->bigInteger('post_id')->unsigned()->default(1);
			$table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
									$table->foreign('post_id')
			->references('id')
			->on('posts')
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
        Schema::dropIfExists('comments');
    }
};
