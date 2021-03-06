<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddETypeIdToEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Add 'etype_id' column to 'events' table
		Schema::table('events', function($table)
		{
			$table->integer('etype_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop 'etype_id' column from 'events' table
		Schema::table('events', function($table)
		{
			$table->dropColumn('etype_id');
		});
	}

}
