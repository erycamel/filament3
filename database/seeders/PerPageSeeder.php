<?php

namespace Database\Seeders;

use App\Models\PerPage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $per_pages = [
            ['item' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['item' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['item' => 50, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['item' => 75, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['item' => 100, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        PerPage::insert($per_pages);
    }
}
