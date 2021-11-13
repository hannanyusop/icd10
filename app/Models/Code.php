<?php

namespace App\Models;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Validation\Rule;
use Redbastie\Crudify\Traits\FillsColumns;

class Code extends Model
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

    public static function rules(Code $code = null)
    {
        return [
            'name' => ['required', Rule::unique('codes')->ignore($code->id ?? null)],
        ];
    }

    public function chapter(){
        return $this->hasOne(Chapter::class, 'id', 'icd10_chapter');
    }

    public function block(){
        return $this->hasOne(Block::class, 'id_block', 'icd10_block');
    }
}
