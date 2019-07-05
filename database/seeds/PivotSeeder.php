<?php

use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pivots')->truncate();
        App\Models\Pivot::create([
            'store_id' => '1',
            'product_id' => '1',
            'quantity' => '50'
        ]);
    }
}
