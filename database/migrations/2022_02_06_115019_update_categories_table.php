<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
				$table->unsignedBigInteger('categorie_id')->nullable()->after('id');

				$table->foreign('categorie_id')
						->references('id')
						->on('categories')
						->onDelete('set null'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
			// $table->dropForeign('posts_categorie_id_foreign');
			// $table->dropColumn('categorie_id');
		});
    }
}
