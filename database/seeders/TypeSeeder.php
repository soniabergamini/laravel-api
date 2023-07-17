<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $types = ["Social Network", "Fitness", "Design", "Mobile App", "Dynamic Web Application", "Animated Web Application", "Single-page Application", "Basic E-Commerce", "Advanced E-Commerce", "Other"];

        foreach ($types as $item) {
            $newType = new Type();
            $newType->name = $item;
            $newType->save();
        }

        // for ($x=0; $x < 10; $x++) {
        //     $type = new Type();
        //     $type->name = $faker->word();
        //     $type->save();
        // }
    }
}
