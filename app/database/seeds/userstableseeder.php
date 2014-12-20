<?php

class userstableseeder extends Seeder {

	
	public function run()
	{
		DB::table('users')->delete();
		
		$users = array(
			array(
				'name' => 'Eric',
				'password' => Hash::make('eric'),
				'email' => 'email@email.com'
			)
		);
		
		DB::table('users')->insert($users);
	}

}
