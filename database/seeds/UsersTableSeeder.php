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
        DB::table('users')->insert([
	        [
	        	'name' => 'Admin',
	        	'email' => 'admin@admin.com',
	        	'password' => bcrypt('admin'),
	        	'picture' => '/storage/profile/profile1.png',
	        	'gender' => 'Male',
	        	'dob' => '1998-03-23',
	        	'address' => 'binus kav. 22 street',
	        	'role' => 'admin'
	        ],
	    	[
	    		'name' => 'User',
	        	'email' => 'user@user.com',
	        	'password' => bcrypt('user'),
	        	'picture' => '/storage/profile/profile2.jpg',
	        	'gender' => 'Female',
	        	'dob' => '1998-01-01',
	        	'address' => 'binus kav. 22 street',
	        	'role' => 'member'
	    	]
    	]);
    }
}
