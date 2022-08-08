<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Sheet;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'screening_date' => CarbonImmutable::now(),
            'schedule_id' => Schedule::factory(),
            'sheet_id'=>5,
            'email'=>$this->faker->email,
            'name'=>$this->faker->realText(20),
        ];
    }
}
