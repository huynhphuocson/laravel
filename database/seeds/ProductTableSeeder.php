<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'name' => 'Sản phẩm 1',
            ],
            [
                'name' => 'Sản phẩm 2',
            ],
            [
                'name' => 'Sản phẩm 3',
            ],
            [
                'name' => 'Sản phẩm 4',
            ],
        ]);
    }
}
