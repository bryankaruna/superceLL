<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(HeaderTransactionsTableSeeder::class);
        $this->call(DetailTransactionsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
