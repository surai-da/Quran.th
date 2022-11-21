<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arabics', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('datasurah_id')->index('id');
			$table->integer('ayat')->index('ayat');
			$table->string('text', 1900);
			$table->text('transliteration');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arabics');
	}

}
