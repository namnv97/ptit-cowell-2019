<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $arr = [];
        for ($i = 0; $i < 10; $i ++) {
            $arr[] = [
                'name' => $faker->name,
                'parent_id' => rand(1, 3),
                'description' => $faker->realText(100)
            ];
        }

        DB::table('categories')->insert($arr);
    }
}
