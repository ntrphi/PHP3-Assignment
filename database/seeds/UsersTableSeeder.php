<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users=[
    		[
    			'email'=>'admin@gmail.com',
    			'name'=>'admin',
    			'password'=>Hash::make('123456')
    		],
    		    		[
    			'email'=>'moderator@gmail.com',
    			'name'=>'Mod',
    			'password'=>Hash::make('secret')
    		]
    	];
    	DB::table('users')->insert($users);   
    }
}
