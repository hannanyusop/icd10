<?php

namespace App\Models;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Validation\Rule;
use Redbastie\Crudify\Traits\FillsColumns;

class Chapter extends Model
{
    use HasFactory, FillsColumns;

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->timestamps();
        $table->string('name');
    }

    public static function definition(Generator $faker)
    {
        return [
            'name' => $faker->name,
        ];
    }

    public static function rules(Chapter $chapter = null)
    {
        return [
            'name' => ['required', Rule::unique('chapters')->ignore($chapter->id ?? null)],
        ];
    }
}
