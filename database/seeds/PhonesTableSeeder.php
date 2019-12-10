<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->insert([
	        [
	        	'name' => 'X10',
	        	'price' => 9000000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone1.jpg',
	        	'discount' => 10,
	        	'brand_id' => 1,
	        ],
	        [
	        	'name' => 'Samsung J2',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone2.jpg',
	        	'discount' => 10,
	        	'brand_id' => 2
	        ],
	        [
	        	'name' => 'Mitto 700',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone3.jpg',
	        	'discount' => 10,
	        	'brand_id' => 3
	        ],
	        [
	        	'name' => 'Esia Hidayah',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone4.jpg',
	        	'discount' => 10,
	        	'brand_id' => 4
	        ],
	        [
	        	'name' => 'Motorolla Q12',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone5.jpg',
	        	'discount' => 10,
	        	'brand_id' => 5
	        ],
	        [
	        	'name' => 'Xiaomi A1',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone6.jpg',
	        	'discount' => 10,
	        	'brand_id' => 6
	        ],
	        [
	        	'name' => 'Xiaomi A2',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone7.jpg',
	        	'discount' => 10,
	        	'brand_id' => 6
	        ],
	        [
	        	'name' => 'Xiaomi 5x',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone8.jpg',
	        	'discount' => 10,
	        	'brand_id' => 6
	        ],
	        [
	        	'name' => 'Motorolla M7',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone9.jpg',
	        	'discount' => 10,
	        	'brand_id' => 5
	        ],
	        [
	        	'name' => 'Esia Flip',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone10.jpg',
	        	'discount' => 10,
	        	'brand_id' => 4
	        ],
	        [
	        	'name' => 'Samsung S9+',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone11.jpg',
	        	'discount' => 10,
	        	'brand_id' => 2
	        ],
	        [
	        	'name' => 'Mitto New 64GB',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone12.jpg',
	        	'discount' => 10,
	        	'brand_id' => 3
	        ],
	        [
	        	'name' => 'Samsung S8',
	        	'price' => 2160000,
	        	'stock' => 2,
	        	'desc' => 'Good quality with low price! Grab it fast!',
	        	'image' => '/storage/img/phone13.jpg',
	        	'discount' => 10,
	        	'brand_id' => 2
	        ]
        ]);
    }
}
