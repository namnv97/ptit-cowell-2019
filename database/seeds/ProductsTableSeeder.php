<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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

        for($i = 0; $i < 10; $i ++)
        {
            $arr[] = array(
                'name' => $faker->name,
                'description' => $faker->realText(),
                'price' => rand(1000000,20000000),
                'image' => $faker->imageUrl(600,600,'technics'),
                'cate_id' => rand(1,10),
                'vendor_id' => rand(1,8),
                'quantity' => rand(50,150)

            );
        }

        DB::table('products')->insert($arr);
    }
}
