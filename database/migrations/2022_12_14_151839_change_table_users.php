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
        // avatar of an user
				        Schema::table('users', function (Blueprint $table) {
							$table->string('avatar', 200)->nullable();
				});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		        Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('avatar');
});

        //
    }
};
