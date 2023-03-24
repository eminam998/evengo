<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($count=0;$count<10;$count++){
            DB::table('categories')->insert([
                'title' => $faker->text($maxNbChars = 50),
                'description' => $faker->text($maxNbChars = 200),
            ]);
        }
        
    }
}