<?php

class Create_Locations_Table {    

	public function up()
    {
		Schema::create('locations', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name', 255);
			$table->decimal('price', 10, 2)->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
		});
    }    

	public function down()
    {
		Schema::drop('locations');
    }

}