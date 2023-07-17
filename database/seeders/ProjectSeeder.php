<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        $stacksData = config('store');
        $types = Type::all(["id"]);
        $technologies = Technology::all(["id"]);


        for ($i=0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->word();
            $newProject->domain = $faker->domainName();
            $newProject->description = $faker->paragraphs(4, true);
            // $newProject->image = "https://picsum.photos/id/" . rand(0, 1084) . "/200";
            $newProject->image = "placeholder/sunflower.jpeg";
            $newProject->link = $faker->url();

            $techNum = rand(0,5);
            $projectTech = [];
            for ($x=0; $x < $techNum; $x++) {
                $projectTech[] = $technologies->random()->id;
            }

            $stacks = '';
            for ($c = 0; $c < 4; $c++) {
                $num = rand(0, count($stacksData)-1);
                if (!str_contains($stacks, $stacksData[$num])) {
                    $stacks .= $stacksData[$num] . ' ';
                }
            }

            $newProject->stack = $stacks;
            $newProject->date = $faker->dateTimeBetween('-2 years');
            $newProject->type_id = $types->random()->id;
            // $newProject->stack = $faker->randomElements(['HTML', 'CSS', 'JS', 'PHP', 'LARAVEL', 'VITE', 'VUEJS'], 4);
            $newProject->save();
            $newProject->technologies()->attach(array_unique($projectTech));
        }
    }
}
