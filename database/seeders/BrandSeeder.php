<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory(30)->create();
    }
}
