<?php

use Illuminate\Database\Seeder;

class HeaderTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('header_transactions')->insert([
        	'date' => '2018-03-23',
        	'status' => 'success',
        	'user_id' => 2
        ]);
    }
}
