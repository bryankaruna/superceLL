<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
        	[
                'name' => 'Apple'
            ],
            [
                'name' => 'Samsung'
            ],
            [
                'name' => 'Mitto'
            ],
            [
                'name' => 'Esia'
            ],
            [
                'name' => 'Motorolla'
            ],
            [
                'name' => 'Xiaomi'
            ],

        ]);
    }
}
