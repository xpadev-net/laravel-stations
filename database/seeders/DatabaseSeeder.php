<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Sheet;
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
        Practice::factory(10)->create();
        Movie::factory(10)->create();
        Schedule::factory(10)->create();
        $sheet = new Sheet();
        $sheet->getConnection()->statement("INSERT INTO `sheets` VALUES(1, 1, 'a'), (2, 2, 'a'), (3, 3, 'a'), (4, 4, 'a'), (5, 5, 'a'), (6, 1, 'b'), (7, 2, 'b'), (8, 3, 'b'), (9, 4, 'b'), (10, 5, 'b'), (11, 1, 'c'), (12, 2, 'c'), (13, 3, 'c'), (14, 4, 'c'), (15, 5, 'c');");
        Reservation::factory(50)->create();
    }
}
