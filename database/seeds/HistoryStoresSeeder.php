<?php

use Illuminate\Database\Seeder;

class HistoryStoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history_stores')->truncate();
        App\Models\HistoryStore::create([
            'store_id' => '1',
            'product_id' => '1',
            'quantity' => '50',
            'type' => '1'
        ]);
    }
}
