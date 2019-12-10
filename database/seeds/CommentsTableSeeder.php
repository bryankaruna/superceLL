<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('comments')->insert([
        	[
                'comment' => 'This smartphone is lit!',
                'phone_id' => 1,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is cool!',
                'phone_id' => 2,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is unbreakable!',
                'phone_id' => 3,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is fantastic!',
                'phone_id' => 4,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is fabulous!',
                'phone_id' => 5,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is amazing!',
                'phone_id' => 6,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is lit!',
                'phone_id' => 7,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is cool!',
                'phone_id' => 8,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is unbreakable!',
                'phone_id' => 9,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is fantastic!',
                'phone_id' => 10,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is fabulous!',
                'phone_id' => 11,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is amazing!',
                'phone_id' => 12,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
            [
                'comment' => 'This smartphone is super!',
                'phone_id' => 13,
                'user_id' => 2,
                'created_at' => '2018-12-29 00:00:00',
            ],
        ]);
    }
}
