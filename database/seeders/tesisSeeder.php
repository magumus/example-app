<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class tesisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0; $i<10; $i++){

        DB::table('tesis')->insert([

            'tesisAdi'=>$faker->company,



        ]);

        }
    }
}
