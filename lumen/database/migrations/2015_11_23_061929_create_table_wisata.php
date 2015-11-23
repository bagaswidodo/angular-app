<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWisata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wisata', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
			$table->text('alamat');
			$table->float('lat');
			$table->float('lng');
			$table->boolean('umum');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			 $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wisata');
	}

}
