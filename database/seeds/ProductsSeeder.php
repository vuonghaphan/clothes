<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'iphone 11',
            'slug'=>'iphone-11',
            'description'=>'Camera sắc nét',
            'quantity'=>'5',
            'price'=>'32000000',
            'promotion'=>'2000000',
            'hot'=>'1',
            'status'=>'0',
            'id_category'=>'1',
            'id_productType'=>'1',
            'img_name'=>'test',
            'img_path'=>'test1',
        ]);
    }
}
