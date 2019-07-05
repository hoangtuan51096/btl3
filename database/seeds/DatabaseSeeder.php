<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            StoreHousesTableSeeder::class,
            PivotSeeder::class,
            HistoryStoresSeeder::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}