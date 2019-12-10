<?php

use Illuminate\Database\Seeder;

class DetailTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_transactions')->insert([
        	'header_id' => 1,
        	'phone_id' => 1,
        	'qty' => 5
        ]);
    }
}
