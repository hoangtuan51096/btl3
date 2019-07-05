<?php

use Illuminate\Database\Seeder;

class StoreHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storehouses')->truncate();
        App\Models\Storehouse::create([
            'name' => 'Kho so 1',
            'account_id' => '1'
        ]);
    }
}
