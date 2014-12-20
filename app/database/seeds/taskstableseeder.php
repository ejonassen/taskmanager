<?php

class taskstableseeder extends Seeder {

	
	public function run()
	{
		DB::table('tasks')->delete();
		
		$tasks = array(
			array(
				'owner_id' => 1,
				'name' => 'get eggs',
				'done' => false
			),
			array(
				'owner_id' => 1,
				'name' => 'get milk',
				'done' => true
			),
			array(
				'owner_id' => 1,
				'name' => 'make breakfast',
				'done' => false
			)
		);
		
		DB::table('tasks')->insert($tasks);
	}

}
