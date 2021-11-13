<?php

namespace Database\Factories;

use App\Models\Raw;
use Illuminate\Database\Eloquent\Factories\Factory;

class RawFactory extends Factory
{
    protected $model = Raw::class;

    public function definition()
    {
        return Raw::definition($this->faker);
    }
}
