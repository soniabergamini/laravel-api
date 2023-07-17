<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $technologies = ['HTML', 'CSS', 'SASS', 'JS', 'PHP', 'LARAVEL', 'VITE', 'VUEJS', 'BOOTSTRAP', 'TAILWIND', 'AXIOS', 'NODEJS'];

        foreach ($technologies as $item) {
            $newTech = new Technology();
            $newTech->name = $item;
            $newTech->save();
        }
    }
}
