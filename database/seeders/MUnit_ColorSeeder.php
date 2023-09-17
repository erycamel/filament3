<?php

namespace Database\Seeders;

use App\Models\MUnit_Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Throwable;

class MUnit_ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MUnit_Color::truncate();

        $csvFile = fopen(base_path("database/data/MUnit_Color.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                try {
                    MUnit_Color::create([
                        "ColorId" => $data['0'],
                        "ColorCode" => $data['1'],
                        "ColorName" => $data['2']
                    ]);
                } catch (Throwable $e) {
                    $this->command->error($e->getMessage());
                }
            }

            $firstline = false;
        }

        fclose($csvFile);
    }
}
